<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CALCULADORA / SIGNO ZODIACAL</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php

include "conexion.php";

const APP = "CALCULADORA DEL ZODIACO";
define("MENSAJE", "Resultado:");

$usuarioFicha = $_GET["usuario"] ?? "";
$colorFicha = $_GET["color"] ?? "";
$hobbyFicha = $_GET["hobby"] ?? "";

$nombre = $_POST["nombre"] ?? "";
$num1 = $_POST["num1"] ?? "";
$num2 = $_POST["num2"] ?? "";
$mes = $_POST["mes"] ?? "";
$dia = $_POST["dia"] ?? "";
$operacion = $_POST["operacion"] ?? "";

$mensajeGuardado = "";
$signo = "";
$textoOperacion = "";
$resultado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($nombre === "" || $mes === "" || $dia === "" || $operacion === "") {
        $mensajeGuardado = "Debes completar los campos obligatorios.";
    } else {
        $mesNum = (int)$mes;
        $diaNum = (int)$dia;

        if (!checkdate($mesNum, $diaNum, 2026)) {
            $mensajeGuardado = "La fecha ingresada no es válida.";
        } else {

            if (($mesNum == 1 && $diaNum >= 20) || ($mesNum == 2 && $diaNum <= 18)) {
                $signo = "Acuario";
            } elseif (($mesNum == 2 && $diaNum >= 19) || ($mesNum == 3 && $diaNum <= 20)) {
                $signo = "Piscis";
            } elseif (($mesNum == 3 && $diaNum >= 21) || ($mesNum == 4 && $diaNum <= 19)) {
                $signo = "Aries";
            } elseif (($mesNum == 4 && $diaNum >= 20) || ($mesNum == 5 && $diaNum <= 20)) {
                $signo = "Tauro";
            } elseif (($mesNum == 5 && $diaNum >= 21) || ($mesNum == 6 && $diaNum <= 20)) {
                $signo = "Géminis";
            } elseif (($mesNum == 6 && $diaNum >= 21) || ($mesNum == 7 && $diaNum <= 22)) {
                $signo = "Cáncer";
            } elseif (($mesNum == 7 && $diaNum >= 23) || ($mesNum == 8 && $diaNum <= 22)) {
                $signo = "Leo";
            } elseif (($mesNum == 8 && $diaNum >= 23) || ($mesNum == 9 && $diaNum <= 22)) {
                $signo = "Virgo";
            } elseif (($mesNum == 9 && $diaNum >= 23) || ($mesNum == 10 && $diaNum <= 22)) {
                $signo = "Libra";
            } elseif (($mesNum == 10 && $diaNum >= 23) || ($mesNum == 11 && $diaNum <= 21)) {
                $signo = "Escorpio";
            } elseif (($mesNum == 11 && $diaNum >= 22) || ($mesNum == 12 && $diaNum <= 21)) {
                $signo = "Sagitario";
            } else {
                $signo = "Capricornio";
            }

            if ($operacion === "sumar" || $operacion === "restar" || $operacion === "multiplicar") {

                if ($num1 === "" || $num2 === "") {
                    $mensajeGuardado = "Para realizar la operación, debes completar los dos números.";
                } else {
                    $n1 = (float)$num1;
                    $n2 = (float)$num2;

                    if ($operacion === "sumar") {
                        $resultado = $n1 + $n2;
                        $textoOperacion = "Suma";
                    } elseif ($operacion === "restar") {
                        $resultado = $n1 - $n2;
                        $textoOperacion = "Resta";
                    } else {
                        $resultado = $n1 * $n2;
                        $textoOperacion = "Multiplicación";
                    }
                }

            } elseif ($operacion === "signo") {
                $resultado = null;
                $textoOperacion = "Solo signo zodiacal";
            }

            if ($mensajeGuardado === "") {

                $sql = "INSERT INTO resultados 
                        (nombre, num1, num2, operacion, resultado, mes, dia, signo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($conexion, $sql);

                if ($stmt) {
                    $num1BD = ($num1 === "") ? null : (float)$num1;
                    $num2BD = ($num2 === "") ? null : (float)$num2;
                    $resultadoBD = ($resultado === null) ? null : (float)$resultado;

                    mysqli_stmt_bind_param(
                        $stmt,
                        "sddsdiss",
                        $nombre,
                        $num1BD,
                        $num2BD,
                        $operacion,
                        $resultadoBD,
                        $mesNum,
                        $diaNum,
                        $signo
                    );

                    if (mysqli_stmt_execute($stmt)) {
                        $mensajeGuardado = "El resultado fue calculado y guardado correctamente en la base de datos.";
                    } else {
                        $mensajeGuardado = "Error al guardar los datos: " . mysqli_error($conexion);
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    $mensajeGuardado = "Error al preparar la consulta SQL: " . mysqli_error($conexion);
                }
            }
        }
    }
}
?>

<div class="box">
    <h1><?php echo APP; ?></h1>

    <h2>Ficha del usuario</h2>

    <form method="GET">
        <label>Nombre para la ficha:</label>
        <input type="text" name="usuario" placeholder="Ej: Nicolás" value="<?php echo htmlspecialchars($usuarioFicha); ?>" required>

        <label>Color favorito:</label>
        <input type="text" name="color" placeholder="Ej: Azul" value="<?php echo htmlspecialchars($colorFicha); ?>" required>

        <label>Hobby:</label>
        <input type="text" name="hobby" placeholder="Ej: Programar" value="<?php echo htmlspecialchars($hobbyFicha); ?>" required>

        <button type="submit">Mostrar ficha</button>
    </form>

    <?php
    if (isset($_GET["usuario"]) && isset($_GET["color"]) && isset($_GET["hobby"])) {
        echo "<div class='resultado'>";
        echo "<p>Nombre: " . htmlspecialchars($usuarioFicha) . "</p>";
        echo "<p>Color favorito: " . htmlspecialchars($colorFicha) . "</p>";
        echo "<p>Hobby: " . htmlspecialchars($hobbyFicha) . "</p>";
        echo "</div>";
    }
    ?>

    <hr>

    <h2>Calculadora y signo zodiacal</h2>

    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>

        <label>Número 1:</label>
        <input  type="number" name="num1"  step="0.01" value="<?php echo htmlspecialchars($num1); ?>">

        <label>Número 2:</label>
        <input type="number" name="num2" step="0.01" value="<?php echo htmlspecialchars($num2); ?>">

        <label>Mes:</label>
        <select name="mes" required>
            <option value="">Seleccionar</option>
            <option value="1" <?php if ($mes == "1") echo "selected"; ?>>Enero</option>
            <option value="2" <?php if ($mes == "2") echo "selected"; ?>>Febrero</option>
            <option value="3" <?php if ($mes == "3") echo "selected"; ?>>Marzo</option>
            <option value="4" <?php if ($mes == "4") echo "selected"; ?>>Abril</option>
            <option value="5" <?php if ($mes == "5") echo "selected"; ?>>Mayo</option>
            <option value="6" <?php if ($mes == "6") echo "selected"; ?>>Junio</option>
            <option value="7" <?php if ($mes == "7") echo "selected"; ?>>Julio</option>
            <option value="8" <?php if ($mes == "8") echo "selected"; ?>>Agosto</option>
            <option value="9" <?php if ($mes == "9") echo "selected"; ?>>Septiembre</option>
            <option value="10" <?php if ($mes == "10") echo "selected"; ?>>Octubre</option>
            <option value="11" <?php if ($mes == "11") echo "selected"; ?>>Noviembre</option>
            <option value="12" <?php if ($mes == "12") echo "selected"; ?>>Diciembre</option>
        </select>

        <label>Día:</label>
        <input 
            type="number" 
            name="dia" 
            min="1" 
            max="31" 
            value="<?php echo htmlspecialchars($dia); ?>" 
            required
        >

        <div class="botones">
            <button type="submit" name="operacion" value="sumar">Sumar</button>
            <button type="submit" name="operacion" value="restar">Restar</button>
            <button type="submit" name="operacion" value="multiplicar">Multiplicar</button>
            <button type="submit" name="operacion" value="signo">Ver signo</button>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        echo "<div class='resultado'>";

        if ($mensajeGuardado !== "") {
            echo "<p>" . htmlspecialchars($mensajeGuardado) . "</p>";
        }

        if ($signo !== "") {
            echo "<p><strong>Hola " . htmlspecialchars($nombre) . "</strong></p>";

            if ($textoOperacion !== "") {
                echo "<p>Operación: <strong>" . htmlspecialchars($textoOperacion) . "</strong></p>";
            }

            if ($resultado !== null) {
                echo "<p>" . MENSAJE . " <strong>" . htmlspecialchars((string)$resultado) . "</strong></p>";
            }

            echo "<p>Tu signo es: <strong>" . htmlspecialchars($signo) . "</strong></p>";
        }

        echo "</div>";
    }
    ?>
</div>

<footer>
    <p>&copy; 2026 Nicolás Riveira | Calculadora del Zodiaco.</p>
</footer>

</body>
</html>