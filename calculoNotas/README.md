# Docker: PHP & MySQL

Se ha añadido soporte para trabajar con otras versiones de php. Se ha modificado el archivo docker de la máquina para instalar:

* pdo
* pdo_mysql
* zip
* bcmath
* intl
* gd
* [Composer](https://getcomposer.org/)

Se han habilitado los módulos `rewrite` y `headers`.

Además se ha modificado el fichero php.ini modificando las siguientes directivas:

* memory_limit=512M
* max_execution_time=12000
* post_max_size=256M
* upload_max_size=256M
* error_reporting=E_ALL

Se pueden agregar/modificar directivas adicionales añadiendo/modificando el fichero `./docker/php/custom-php.ini`

Se ha instalado xdebug con la siguiente configuración:

* zend_extension=xdebug.so
* xdebug.mode=develop,debug
* xdebug.start_with_request=yes
* xdebug.discover_client_host=0
* xdebug.client_host=host.docker.internal
* xdebug.log_level=7
* xdebug.log=/tmp/xdebug.log

Se puede modificar la configuración modificando el fichero `./docker/php/xdebug.ini`

Readme original
---

Instala rápidamente un ambiente de desarrollo local para trabajar con [PHP](https://www.php.net/) y [MySQL](https://www.mysql.com/) utilizando [Docker](https://www.docker.com). 

Utilizar *Docker* es sencillo, pero existen tantas imágenes, versiones y formas para crear los contenedores que hacen tediosa esta tarea. Este proyecto ofrece una instalación rápida, con versiones estandar y con la mínima cantidad de modificaciones a las imágenes de Docker. 

Viene configurado con  `PHP 7.4` y `MySQL 5.7`, además se incluyen las extensiones `gd`, `zip` y `mysql`.

## Requerimientos

* [Docker Desktop](https://www.docker.com/products/docker-desktop)

## Configurar el ambiente de desarrollo

Puedes utilizar la configuración por defecto, pero en ocasiones es recomendable modificar la configuración para que sea igual al servidor de producción. La configuración se ubica en el archivo `.env` con las siguientes opciones:

* `PHP_VERSION` versión de PHP ([Versiones disponibles de PHP](https://github.com/docker-library/docs/blob/master/php/README.md#supported-tags-and-respective-dockerfile-links)).
* `PHP_PORT` puerto para servidor web.
* `MYSQL_VERSION` versión de MySQL([Versiones disponibles de MySQL](https://hub.docker.com/_/mysql)).
* `MYSQL_USER` nombre de usuario para conectarse a MySQL.
* `MYSQL_PASSWORD` clave de acceso para conectarse a MySQL.
* `MYSQL_DATABASE` nombre de la base de datos que se crea por defecto.

## Instalar el ambiente de desarrollo

La instalación se hace en línea de comandos:

```zsh
docker-compose up -d
```
Puedes verificar la instalación accediendo a: [http://localhost/info.php](http://localhost/info.php)

## Comandos disponibles

Una vez instalado, se pueden utilizar los siguiente comandos:

```zsh
docker-compose start    # Iniciar el ambiente de desarrollo
docker-compose stop     # Detener el ambiente de desarrollo
docker-compose down     # Detener y eliminar el ambiente de desarrollo.
```

## Estructura de Archivos

* `/docker/` contiene los archivos de configuración de Docker.
* `/www/` carpeta para los archivos PHP del proyecto.

## Accesos

### Web

* http://localhost/

### Base de datos

Existen dos dominios para conectarse a base de datos.

* `mysql`: para conexión desde los archivos PHP.
* `localhost`: para conexiones externas al contenedor.

Las credenciales por defecto para la conexión son:

| Usuario | Clave | Base de datos |
|:---:|:---:|:---:|
| dbuser | dbpass | dbname |
