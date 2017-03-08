# Bundles utilizados
Estos son los extras bundles (vendors) que se instalaron para poder realizar la aplicación. 
#### [NelmioApiDoc](https://github.com/nelmio/NelmioApiDocBundle)
Permite documenta los endpoint de acceso con el servidor. Esto permite una facil documentación en la comunicación entre front/back. Como agregado importante este bundle te permite realizar pruebas con facilidad con la función "SandBox".   
#### [DoctrineMigrationsBundle](https://github.com/doctrine/migrations)
Este bundle permite llevar una migración de los cambios que se van realizando en la BD. Como el sistema se monto en un servidor de prueba como Heroku, se requiere realizar migraciones para tener una consistencia en la BD. En el presente sistema solo se realizó una migración inicial ubicada en [Migration](https://github.com/fcontreras2/aavv_strapp/tree/master/app/DoctrineMigrations).