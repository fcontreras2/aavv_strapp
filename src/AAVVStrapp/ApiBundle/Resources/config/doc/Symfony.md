# Symfony 3

Debido que la documentación de Symfony es extensa se mencionará los archivos que son de importancia para el desarrollo del proyecto:

#### Entidades yml y classes php
 - Los archivos yml ubicados en el directorio [...ApiBundle/resources/doctrine](https://github.com/fcontreras2/aavv_strapp/tree/master/src/AAVVStrapp/ApiBundle/Resources/config/doctrine) son utilizados para declarar la relaciones entre las entidades y gestionar la estructura de las tablas en la BD. [Ver Diagrama BD](https://github.com/fcontreras2/aavv_strapp/tree/master/src/AAVVStrapp/ApiBundle/Resources/config/doc/BD.png)
 - Las clases php ubicadas en [...ApiBundle/entity](https://github.com/fcontreras2/aavv_strapp/tree/master/src/AAVVStrapp/ApiBundle/Entity) son las clases con las que se interactuan al momento de aplicar una lógica referente al dominio del sistema.
 - ##### Entidades:
   - [UserProfile](https://github.com/fcontreras2/aavv_strapp/blob/master/src/AAVVStrapp/ApiBundle/Entity/UserProfile.php) Representa a los usuarios registrado en  el sistema.
   - [Location](https://github.com/fcontreras2/aavv_strapp/blob/master/src/AAVVStrapp/ApiBundle/Entity/Location.php) Representa las localidades que pueden formar parte del origen y destino de un viaje
   - [Travel](https://github.com/fcontreras2/aavv_strapp/blob/master/src/AAVVStrapp/ApiBundle/Resources/config/routing.yml) Representa los viajes asociados a los usuarios y a las localidades (origen y destino).

#### Rutas - rounting.yml

El archivo [routing.yml]() es donde se declaran las rutas asociadas a cada entidad del dominio. Para este sistema se dividio en tres archivos .yml que hacen referencia a los usuarios, viajes y localidad. Se debe acotar que cada ruta se comunica con los controladores de la aplicación.

#### Validaciones - validation.yml
 Las validaciones se realizan mediante el archivo [validation.yml](https://github.com/fcontreras2/aavv_strapp/blob/master/src/AAVVStrapp/ApiBundle/Resources/config/validation.yml) donde se define por entidad el conjunto de restricciones en los atributos de la clase que deben cumplir para ser procesadas en la BD.
 
#### Controladores 
Los [controladores](https://github.com/fcontreras2/aavv_strapp/tree/master/src/AAVVStrapp/ApiBundle/Controller) se encarga de recibir las solicitudes enviadas al servicios, donde se requieran procesar cierta información sobre el dominio. Los controladores estan divididos por entidades (UserProfileController, LocationController, TravelController) de esta manera separando las solicitudes según el contexto. Nota: En los controladores es donde se documenta los endpoint mostrados en el [demo](https://aavvstrapp.herokuapp.com/api/doc) mediante el bundle de [NelmioApiDoc](https://github.com/nelmio/NelmioApiDocBundle).

#### Repositorios
Es el contacto directo con la BD cuando se requiere hacer una consulta, donde cada contacto se hace refente a una entidad [repositorios](https://github.com/fcontreras2/aavv_strapp/tree/master/src/AAVVStrapp/ApiBundle/Repository). En el presente sistema solo se debio realizar consultas sencillas como obtener información de una elemento o obtener todos los elementos.