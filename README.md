# Calculadora del Zodiaco


La aplicación está realizada con **HTML5**, **CSS3**, **PHP** y **MySQL**.

---

## Autor

**Nicolás Riveira**

---

## Descripción del proyecto

**Calculadora del Zodiaco** es una aplicación web simple que permite al usuario realizar operaciones matemáticas básicas y consultar su signo zodiacal según el día y el mes ingresados.

Además, el proyecto incluye una funcionalidad con método **GET** para mostrar una ficha del usuario y una funcionalidad con método **POST** que procesa datos, calcula resultados y guarda la información en una base de datos MySQL.

El proyecto también utiliza un archivo `.env` para separar los datos sensibles de conexión a la base de datos, evitando escribir el usuario, la contraseña y el host directamente dentro del archivo `index.php`.

---

## Funcionalidades principales

- Sitio maquetado con **HTML5** y **CSS3**.
- Diseño responsive para computadora, tablet y celular.
- Formulario con método **GET** para mostrar una ficha del usuario.
- Formulario con método **POST** para calcular operaciones y consultar el signo zodiacal.
- Conexión a base de datos MySQL mediante un archivo separado llamado `conexion.php`.
- Uso de archivo `.env` para guardar las credenciales de conexión.
- Uso de archivo `.gitignore` para evitar subir el archivo `.env` a GitHub.
- Registro de resultados en la tabla `resultados`.
- Uso de consultas preparadas con `mysqli_prepare`.
- Validación de fecha usando `checkdate`.
- Protección de datos mostrados en pantalla usando `htmlspecialchars`.

---

## Tecnologías utilizadas

- HTML5
- CSS3
- PHP
- MySQL
- MySQLi
- phpMyAdmin
- XAMPP
- InfinityFree
- Git
- GitHub

---

## Estructura del proyecto

```txt
utn-php/
├── .gitignore
├── conexion.php
├── index.php
├── README.md
├── riveira_nicolas.sql
└── styles.css
```

El archivo `.env` también debe existir para ejecutar el proyecto, pero no se sube a GitHub por seguridad.

Estructura local completa:

```txt
utn-php/
├── .env
├── .gitignore
├── conexion.php
├── index.php
├── README.md
├── riveira_nicolas.sql
└── styles.css
```

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
- Ver signo zodiacal

Cuando se envía el formulario, PHP realiza las siguientes acciones:

1. Valida que los campos obligatorios estén completos.
2. Verifica que la fecha ingresada sea válida.
3. Calcula el signo zodiacal según el día y el mes.
4. Realiza la operación matemática seleccionada, si corresponde.
5. Guarda el resultado en la base de datos MySQL.

---

## Base de datos

Nombre de la base de datos:

```txt
riveira_nicolas
```

En InfinityFree, el nombre de la base puede tener un prefijo del usuario. Por ejemplo:

```txt
if0_XXXXXXXX_riveira_nicolas
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

Este archivo debe importarse desde **phpMyAdmin**.

---

## Archivo .env

El archivo `.env` se utiliza para guardar los datos de conexión a la base de datos.

Ejemplo de estructura:

```env
DB_HOST=sqlXXX.infinityfree.com
DB_USER=if0_XXXXXXXX
DB_PASSWORD=TU_CONTRASEÑA
DB_NAME=if0_XXXXXXXX_riveira_nicolas
```

Este archivo debe estar en la misma carpeta que `conexion.php`.

Importante: el archivo `.env` no debe subirse a GitHub porque contiene información sensible.

---

## Archivo .gitignore

El archivo `.gitignore` evita que el archivo `.env` se suba al repositorio de GitHub.

Contenido recomendado:

```gitignore
.env
.DS_Store
Thumbs.db
```

Esto ayuda a proteger los datos privados de conexión a la base de datos.

---

## Conexión a la base de datos

La conexión a MySQL se realiza desde el archivo `conexion.php`.

Este archivo lee los datos del archivo `.env` usando `parse_ini_file()` y luego crea la conexión con `mysqli_connect`.

Código utilizado:

```php
<?php

$env = parse_ini_file(".env");

$host = $env["DB_HOST"];
$usuarioBD = $env["DB_USER"];
$claveBD = $env["DB_PASSWORD"];
$nombreBD = $env["DB_NAME"];

$conexion = mysqli_connect($host, $usuarioBD, $claveBD, $nombreBD);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8mb4");

?>
```

En el archivo `index.php`, la conexión se importa con:

```php
include "conexion.php";
```

De esta manera, el archivo principal queda más limpio y los datos sensibles quedan separados.

---

## Cómo ejecutar el proyecto en local con XAMPP

### 1. Copiar la carpeta del proyecto

Copiar la carpeta del proyecto dentro de:

```txt
C:\xampp\htdocs\
```

Por ejemplo:

```txt
C:\xampp\htdocs\utn-php
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

Crear una base de datos llamada:

```txt
riveira_nicolas
```

Luego importar el archivo:

```txt
riveira_nicolas.sql
```

---

### 5. Crear el archivo .env local

En la carpeta principal del proyecto, crear un archivo llamado:

```txt
.env
```

Ejemplo para XAMPP:

```env
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=
DB_NAME=riveira_nicolas
```

---

### 6. Abrir el proyecto en el navegador

Ingresar a:

```txt
http://localhost/utn-php/
```

---

## Cómo subir el proyecto a InfinityFree

Para subir el proyecto a InfinityFree, se deben subir los archivos principales dentro de la carpeta `htdocs`.

Archivos necesarios en InfinityFree:

```txt
htdocs/
├── .env
├── conexion.php
├── index.php
└── styles.css
```

El archivo `riveira_nicolas.sql` no se ejecuta directamente desde el navegador. Se importa desde **phpMyAdmin** dentro del panel de InfinityFree.

---

## Configuración del archivo .env en InfinityFree

En InfinityFree, el archivo `.env` debe tener los datos reales de la base de datos creada en el panel.

Ejemplo:

```env
DB_HOST=sqlXXX.infinityfree.com
DB_USER=if0_XXXXXXXX
DB_PASSWORD=TU_CONTRASEÑA
DB_NAME=if0_XXXXXXXX_riveira_nicolas
```

Importante: en InfinityFree no se debe usar `localhost` como host de la base de datos. Se debe usar el host MySQL que proporciona el panel de InfinityFree.

---

## Seguridad del proyecto

El proyecto utiliza un archivo `.env` para no escribir datos sensibles directamente dentro del código principal.

Además, el archivo `.gitignore` evita que `.env` se suba a GitHub.

Esto permite que el repositorio sea más seguro, más prolijo y más fácil de compartir.

---

## Validaciones implementadas

- El formulario exige completar los campos obligatorios.
- Se valida que la fecha ingresada sea correcta usando `checkdate`.
- Si se elige una operación matemática, se deben completar los dos números.
- Los datos mostrados en pantalla se protegen con `htmlspecialchars`.
- Los datos se insertan en la base usando consultas preparadas con `mysqli_prepare`.
- Se utiliza `mysqli_stmt_bind_param` para vincular los datos antes de ejecutar la consulta.
- Se utiliza `mysqli_stmt_execute` para guardar la información en la base de datos.

---

## Diseño responsive

El archivo `styles.css` incluye estilos adaptados para diferentes tamaños de pantalla:

- Computadoras de escritorio
- Tablets
- Celulares
- Celulares pequeños

El diseño utiliza una caja principal centrada, botones organizados, formularios limpios y media queries para mejorar la experiencia visual en distintos dispositivos.

---

## Archivos principales

### index.php

Contiene la estructura principal del sitio, los formularios GET y POST, la lógica para calcular el signo zodiacal, las operaciones matemáticas y el guardado en la base de datos.

### conexion.php

Contiene la conexión a la base de datos. Lee los datos desde el archivo `.env`.

### styles.css

Contiene los estilos visuales del proyecto y el diseño responsive.

### riveira_nicolas.sql

Contiene la estructura de la base de datos y la tabla `resultados`.

### .gitignore

Evita que el archivo `.env` se suba a GitHub.

### .env

Contiene los datos privados de conexión a la base de datos. Este archivo debe existir localmente y en InfinityFree, pero no debe subirse al repositorio.

