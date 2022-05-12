# Proyecto de Sidetrack

Backend en php para el proyecto de las landings de SideTrack.

Todas las peticiones estan ubicadas en `php/peticiones.php`. Se crea a base de funciones anonimas las cuales llaman a su respectiva `class`.

## Funciones
Se manejan funciones anonimas las cuales entan dentro de **php/peticiones.php**, observarás que hay una `function();` para cada combo y una en especifico una para el ´guardaDatos();´

## Clases
Solo hay 3 clases en el proyecto:
- `abstract class WebService`: Se encarga de hacer la conexión a las url del `WebService` `OperacionesUnificadas`. 
- `class COMBOS`: Obtiene la parte de los combos de la oferta academica de unimex
- `class AddProspecto`: agrega al prospecto.

También se encuentran las propiedades privadas.

### Constructor
Observarás que hay 2 urls, 
- `$url`: para la conexion al ws `OperacionesUnificadas.
- `$urlSua`: para obtener las carreras, este se desarrollo especialmente para este proyecto por el tema de SUA en el plantel de Veracruz.