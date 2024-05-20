
# Formularios de pago sencillos

El proyecto está pensado para usarse en situaciones simples, donde se requiera almacenar información básica de los clientes, cuya identificación tiene que ser única.


## Instalación

Para la Instalación debe tener instaladas las tecnologías [composer](https://getcomposer.org) y [node.js](https://nodejs.org/en) (para npm):


Realiza un fork de este repositorio, luego clona tu fork y ejecuta esto en tu directorio recién creado:
```bash
  composer install
  npm install
```

A continuación, debe hacer una copia del archivo .env.example y cambiarle el nombre a .env dentro de la raíz de su proyecto.

Ejecute el siguiente comando para generar la clave de su aplicación:
```bash
  php artisan key:generate
```

Para finalizar la instalación, deberá levantar los servicios de la base de datos configurada en el archivo .env dentro de la raíz de su proyecto.

Ejecute el siguiente comando para crear la base de datos:
```bash
  php artisan migrate
```

Para usarse deberá levantar los servicios necesarios, en el caso de la base de datos no se tomará, deberá levantar el servicio dependiendo de la configurada en su archivo .env dentro de la raíz de su proyecto.

Para levantar los servicios deberá ejecutar los siguientes comandos:
```bash
  php artisan serve
  npm run dev
```
## Tecnologías

Para la realización del proyecto se ha empleado el stack de desarrollo TALL (TailwindCSS, Alpine.JS, Laravel y LiveWire) en conjunto con varias Librerías, con el fin de desarrollar un sistema moderno y adaptable.

Un breve listado de algunas de las Tecnologías empleadas:

**Cliente:** [TailwindCSS](https://tailwindcss.com), [LiveWire](https://livewire.laravel.com), [MaryUI](https://mary-ui.com), [Alpine.JS](https://alpinejs.dev)

**Servidor:** [Laravel](https://laravel.com)

**Librerías:** [Laravel-DOMPDF](https://github.com/barryvdh/laravel-dompdf), [Números a letras](https://github.com/lecano/php-numero-a-letras)

