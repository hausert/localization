# Localization service

## Vhost

Los vhost deben apuntar a $PATH\webroot 

## DB

1) En necesario ejecutar el sql que se encuentra en el raiz "localizationschema.sql".
2) Configurar la db dentro del archivo de configuracion config/app.php . 

## ACL

Los acl se setean dentro de config/app.php . 



## Métodos habilitados

GET :: consulta de locaciones
POST :: inserción nuevas locaciones
PUT :: actualizaciónes de locaciones
DELETE :: borrar locaciones

## Headers 

X-CSRF-Token:2f09107895ab1adf4c28c5e430f0e7943a465ac967b33ae6fc6a7bf234075de47bf12f28b93ad872665c1727a0ad0a3b1e44f61c4cdbfa11abc7976166b8e693
Content-Type:application/x-www-form-urlencoded
Token:glocalization

## País - Servicio REST
/country.json ( GET | POST )
/country/country_id.json ( GET | PUT | DELETE )
acl - token
GET :: ucountry,glocalization
POST :: ucountry
PUT :: ucountry
DELETE :: ucountry

## Provincia/Estado/Condado - Servicio REST
/state.json ( GET | POST )
/state/state_id.json ( GET | PUT | DELETE )
acl - token
GET :: ustate,glocalization
POST :: ustate
PUT :: ustate
DELETE :: ustate

## Ciudad - Servicio REST
/city.json ( GET | POST )
/city/city_id.json ( GET | PUT | DELETE )
acl - token
GET :: ucity,glocalization
POST :: ucity
PUT :: ucity
DELETE :: ucity

## árbol locaciones - Servicio REST
/localizationtree.json ( GET )
acl - token
GET :: glocalization