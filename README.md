# Calculadora del Zodiaco

Proyecto desarrollado para el Trabajo Práctico Final del curso.

La aplicación está realizada con **HTML5, CSS3, PHP y MySQL**.

---

## Autor

**Nicolás Riveira**

---

## Descripción del proyecto

**Calculadora del Zodiaco** es una aplicación web simple que permite al usuario realizar operaciones matemáticas básicas y consultar su signo zodiacal según el día y el mes ingresados.

Además, el proyecto incluye una funcionalidad con método **GET** para mostrar una ficha del usuario y una funcionalidad con método **POST** que guarda los resultados en una base de datos MySQL.

---

## Funcionalidades principales

- Sitio maquetado con **HTML5** y **CSS3**.
- Diseño responsive para computadora, tablet y celular.
- Formulario con método **GET** para mostrar una ficha del usuario.
- Formulario con método **POST** para calcular operaciones y consultar el signo zodiacal.
- Conexión a base de datos MySQL.
- Registro de resultados en la tabla `resultados`.
- Uso de estructuras de control `if`, `elseif` y `else`.
- Uso de funciones del lenguaje como:
  - `mysqli_connect`
  - `mysqli_prepare`
  - `mysqli_stmt_bind_param`
  - `mysqli_stmt_execute`
  - `checkdate`
  - `htmlspecialchars`

---

## Funcionalidad con método GET

La aplicación incluye una sección llamada **Ficha del usuario**.

En esta parte se ingresan tres datos:

- Nombre
- Color favorito
- Hobby

Estos datos se envían mediante el método **GET** y se muestran en pantalla usando variables de PHP.

Ejemplo de URL generada:

```txt
index.php?usuario=Nicolas&color=Azul&hobby=Programar
```

---

## Funcionalidad con método POST y base de datos

La sección **Calculadora y signo zodiacal** utiliza el método **POST**.

El usuario ingresa:

- Nombre
- Número 1
- Número 2
- Mes
- Día
- Operación

Las operaciones disponibles son:

- Sumar
- Restar
- Multiplicar
- Ver signo

Cuando se envía el formulario, PHP calcula el resultado correspondiente, obtiene el signo zodiacal y guarda la información en la base de datos.

---

## Base de datos

Nombre de la base de datos:

```txt
riveira_nicolas
```

Nombre de la tabla:

```txt
resultados
```

Campos principales de la tabla:

- `id`
- `nombre`
- `num1`
- `num2`
- `operacion`
- `resultado`
- `mes`
- `dia`
- `signo`
- `fecha`

El archivo de base de datos incluido en la entrega es:

```txt
riveira_nicolas.sql
```

---

## Estructura del proyecto

```txt
riveira_nicolas/
├── index.php
├── styles.css
├── README.md
└── riveira_nicolas.sql
```

---

## Tecnologías utilizadas

- HTML5
- CSS3
- PHP
- MySQL
- phpMyAdmin
- XAMPP

---

## Cómo ejecutar el proyecto en local

### 1. Copiar la carpeta del proyecto

Copiar la carpeta del proyecto dentro de:

```txt
C:\xampp\htdocs\
```

La carpeta debe llamarse:

```txt
riveira_nicolas
```

---

### 2. Iniciar XAMPP

Abrir XAMPP e iniciar los siguientes servicios:

- Apache
- MySQL

---

### 3. Entrar a phpMyAdmin

Abrir el navegador e ingresar a:

```txt
http://localhost/phpmyadmin
```

---

### 4. Crear o importar la base de datos

Crear o importar la base de datos usando el archivo:

```txt
riveira_nicolas.sql
```

---

### 5. Abrir el proyecto en el navegador

Ingresar a:

```txt
http://localhost/riveira_nicolas/
```

---

## Configuración de conexión

En el archivo `index.php`, la conexión local está configurada de la siguiente manera:

```php
$host = "localhost";
$usuarioBD = "root";
$claveBD = "";
$nombreBD = "riveira_nicolas";
```

Esta configuración corresponde al entorno local de XAMPP.

---

## Validaciones implementadas

- El formulario exige completar los campos obligatorios.
- Se valida que la fecha ingresada sea correcta usando `checkdate`.
- Si se elige una operación matemática, se deben completar los dos números.
- Los datos mostrados en pantalla se protegen con `htmlspecialchars`.
- Los datos se insertan en la base usando consultas preparadas con `mysqli`.

---

## Diseño responsive

El archivo `styles.css` incluye media queries para adaptar el diseño a diferentes tamaños de pantalla:

- Computadoras de escritorio
- Tablets
- Celulares
- Celulares pequeños

