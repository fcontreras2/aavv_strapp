# AAVV Strapp Api

AAVV Strapp Api es un desarrollo del backend, donde  mediante solicitudes y peticiones GET y POST, se puede procesar información del registro de usuarios y viajes de la agencia de viaje AAVV Strapp. 

# Tecnologías y herramientas utilizadas

  - Sistema Operativo: Linux (Ej: Ubuntu, LinuxMint)
  - Framework Web: [Symfony3](https://symfony.com)
  - Servidor de hosting: Heroku [ver Demo](https://aavvstrapp.herokuapp.com/api/doc)
  - Servidor de base de datos: freesqldatabase.com
  
# Requerimientos
A continuación, para ejecutar localmente debe contar con los siguientes requisitos. De igual manera se encuentra disponible la opción en Herolu [ver Demo](https://aavvstrapp.herokuapp.com/api/doc) :
  - Git
  - Apache2
  - Php7
  - Php Modulos: xml, mysqli, pdo_mysql, mbstring. Estos requerimientos de Symfony3
  - Mysql 
  - Composer 

Para la instalación de las dependencias ejecute el siguiente comando
```
$ sudo apt-get install php-xml php-mysqli php-mbstring
```
# Instalación

  - Abrel el Terminal - Ubica en el directorio donde quieres descarga el proyecto
  - Ejecutar: 
```
        $ git clone git@github.com:fcontreras2/aavv_strapp.git 
```
```
        $ cd aavv_strapp // Ingresa al directorio aavv_strap
```
```
        $ composer install // esto descarga dependencias de symfony
```
```
        $ php bin/consle server:start // Se ejecuta el servidor local 
```
  - Abre terminal con la siguiente dirección http://localhost:8000/api/doc
  
# Configuración de la BD

##### Requerimiento
Para poder configurar la BD, debe tener instalado previamente una BD en mysql donde desea trabajar. Debe tener cuenta los siguientes datos host, port(opcional), nombre de la BD, usuario, contraseña. Para la configuración debe editar el siguiente archivo en su computadora local:
```
# <directory>/app/config/parameters.yml
parameters:
    database_host: <host>  # Default: 127.0.0.1
    database_port: <port>  # Default: null
    database_name: <data_base> 
    database_user: <user>
    database_password: <passowrd>
    .....
```

#### Configuración en producción

Puede ingresar para ver la BD en producción en la siguiente dirección http://www.phpmyadmin.co/ con los siguientes datos:
```
# <directory>/app/config/parameters.yml
parameters:
    database_host: sql10.freesqldatabase.com
    database_port: 3306
    database_name: sql10162356
    database_user: DRMUNjs6r5
    database_password: DRMUNjs6r5
    .....
```
#### Desarrollo
Los siguientes puntos son puntos de ayuda para entender como fue desarrollador el sistema.

* [Symfony3](https://github.com/fcontreras2/aavv_strapp/tree/master/src/AAVVStrapp/ApiBundle/Resources/config/doc/Symfony.md) - Ubicaciones de archivos y carpetas
* [Diagrama BD](https://github.com/fcontreras2/aavv_strapp/tree/master/src/AAVVStrapp/ApiBundle/Resources/config/doc/BD.png) - Diagrama relacional de la BD  

#### Realizar pruebas

Se debe realizar prueba en la opción de SandBox de cada endpoint

- [Todos](https://aavvstrapp.herokuapp.com/api/doc)
- [Usuarios](https://aavvstrapp.herokuapp.com/api/doc/user)
- [Localidades](https://aavvstrapp.herokuapp.com/api/doc/location)
- [Viajes](https://aavvstrapp.herokuapp.com/api/doc/travel)

###### Nota: Para realizar el presente desarrollo se realizó bajo suposiciones dado el tiempo y la situación de la prueba.
- No se tiene un sistema de seguridad por parte de la agencia. (login) Ya la agencia esta iniciada sesión.
- No se tiene frontend. Por esta razón, en un flujo normal de comunicación entre front y back end, debe crearse primero las localidades y usuarios, para luego crear los viajes asociados al usuario.
- Puede que algunas validaciones fueron pasado por alto. Por ejemplo validaciones de campos como telefono, cedula, entre otros. (factor tiempo)
- El código del viaje es autogenerado por el sistema al momento de crear un viaje. Por esta razón no es un requerimiento al crear un viaje.
- El código de la localidad debe ser ingresado por la agencia de viaje.
- Un viaje depende del usuario, la localidad de origen y la localidad destino.
- La documentación del sistema es mas funcional que a nivel de código. La documentación necesaria esta por el repositorio mediante los README.md y en phpDoc.
 

