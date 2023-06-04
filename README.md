# Cafetería App

Esta es una aplicación de una cafetería que permite almacenar y gestionar el inventario de sus productos. El software está desarrollado en Laravel y utiliza una base de datos MySQL llamada "cafeteria".

## Características

La aplicación cuenta con las siguientes características principales:

- Creación de productos: Permite agregar nuevos productos al inventario de la cafetería. Cada producto tiene un nombre, una descripción, una referencia, una categoria y un stock inicial.
- Edición de productos: Permite actualizar la información de los productos existentes, como el nombre, la descripción, la referencia, la categoria y el stock.
- Eliminación de productos: Permite eliminar productos del inventario de la cafetería.
- Listado de productos: Muestra todos los productos registrados en el sistema, con su información básica, incluyendo nombre, descripción, referencia y stock actual.

Adicionalmente, la aplicación cuenta con un módulo de ventas que permite vender productos específicos:

- Venta de productos: A través de este módulo, se puede realizar la venta de un producto seleccionando el producto e ingresando la cantidad vendida como parámetros. La aplicación actualizará automáticamente el campo de stock, restando la cantidad del producto vendido. Además, se registrará la venta en una tabla para llevar un registro de las transacciones realizadas. Si el producto no cuenta con stock suficiente para la venta, se mostrará un mensaje indicando que no es posible realizar la venta.

## Requisitos

Para ejecutar la aplicación, necesitarás lo siguiente:

- PHP >= 7.4
- Laravel >= 8.x
- MySQL

## Configuración

Sigue los pasos a continuación para configurar y ejecutar la aplicación:

1. Clona el repositorio de la aplicación en tu entorno local.
2. Crea una base de datos en MySQL llamada "cafeteria".
3. Configura las credenciales de conexión a la base de datos en el archivo `.env` del proyecto.
4. Ejecuta el siguiente comando en la terminal para instalar las dependencias de Laravel:

```bash
  composer install
```

5. Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

```bash
  php artisan migrate
```
6. Ejecuta las seeders para llenar las tablas de las categorias necesarias
```bash
  php artisan db:seed
```

6. Inicia el servidor de desarrollo de Laravel:
```bash
  php artisan serve
```

7. Accede a la aplicación en tu navegador a través de la URL proporcionada por el servidor de desarrollo.

¡Listo! Ahora puedes utilizar la aplicación de la cafetería para gestionar el inventario de productos y realizar ventas.
