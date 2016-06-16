# Gestión de Cabañas

Es una aplicación desarrollada en Laravel PHP Framework para la gestión de cabañas dentro de la provincia de Cordoba Argentina.


## Programas requeridos

* Instalar XAMPP o algún stack MySQL, Apache, y PHP
* Instalar Composer

## Puesta en marcha del Proyecto

* Descargar el repositorio
* Iniciar servicios de Apache y MySQL
* Dentro de la carpeta del Proyecto, abrir una terminal y actualizar las librerías de composer con el siguiente comando:
```
	composer update
```
* Crear el archivo .env con la configuración de la base de datos (renombrar el archivo .env.example)
* Crear una Base de Datos con el nombre que desee en phpMyAdmin
* Ejecutar el siguiente comando en la consola:
```
	php artisan key:generate
	php artisan migrate
```
* Para ejecutar de forma local ejecute en la consola: 
```
	php artisan serve
```
* Ejecutar la pagina desde http://localhost:8000/
