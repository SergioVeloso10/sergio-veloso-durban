

## Prueba Importadora Durbán. 

Gracias por leer este apartado. 
Este codigo esta escrito en php utilizando el framework laravel
Para tener el servidos virtual corriendo, se utlizo la herramienta laragon. 
El diseño de este proyecto se realizo con AdminLTE3. 

El desafío de este proyecto era la realizacion de un crud en base al modelo entregado. 
Cada una de las caracteristicas estaran detallas en este texto. 

Para conectarse a la base de datos, debemos configurar las variables de entorno en el archivo .env 

Para correr el proyecto debemos ir a la ruta "http://importadoradurban.test/" que es la pagina de inicio del proyecto. 

Al iniciar el proyecto se listan todos los productos que se pueden comprar. 
En el panel del lado izquierdo hay un apartado que dice admin; este panel solo podria ver los administradores, pero no se implementaron roles por lo que estan dentro de la misma ventana. 
En este apartado hay un boton que dice CRUD, aca se puede observar en totalidad un crud implementado para los productos. 

Se incorporo un carrito de compra que se saco de este blog https://codea.app/blog/carrito-de-compra
Es un modulo que contiene parte de la logica detras de un carrito de venta. 
Para integrarlo a nuestro proyecto se utiliza el siguiente comando "composer require "darryldecode/cart""

Dentro de la ventana carrito existe la opcion de comprar, al presionar este boton, se ingresan los productos y los datos de la compra en las respectivas tablas (venta, detalleventa, movimientos).
para poder ver reflejadas estas tablas, hacemos click en boton mis compras en donde se veran detallados las ventas que se realizaron al cliente y su ves cada venta tiene un boton que permite ver el detalle de esa venta que contendra todos los productos y los precios de cada uno. 

Para acceder a movimientos nos debemos dirigir al apartado de administrador y entrar en movimientos,
aqui estaran detalladas todos los detalleventa de cada venta. 
