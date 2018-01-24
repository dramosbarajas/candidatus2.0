# Proyecto Fin de Grado - Candidatus 2.0

# Introducción

<p> Trabajo de fin de grado para el Ciclo Formativo de Grado Superior de Desarrollo de Aplicaciones Web </p> 
<p> Se trata de una aplicación de entorno web, para gestionar una pequeña base de datos de candidatos y ofertas de empleo. La construcción de la misma ha sido usando Laravel y Vue.js 2.0 con un base de datos relacional.</p>

# Instalación

<p> A continuación de detallan los pasos para la instalar y poner en funcionamiento el proyecto.</p>

 1. Clonar o descargar el repositorio. 
 2. Instalar Node.js. [Descargar / Download](https://nodejs.org/es/)
 3. Instalar Composer. [Descargar / Download](https://getcomposer.org/)
 4. Acceder al directorio de la aplicación. 
 5. En un terminal teclear **npm install**
 6. Renombrar el fichero **.env.example** por **.env** y añadir los datos de base de datos. 
 7. Crear una base de datos con el nombre **candidatus** y ejecutar el script para la creación de las tablas y su contenido.
 8. Ejecutar desde un terminal **php artisan key:generate**
 9. Siguiendo el paso anterior ejecutar **npm run dev** para generar el fichero de webpack. 
 10. Lanzar la aplicación con el comando **php artisan serve** 

**La aplicación se encuentra en una primera versión y si bien se ha intentado depurar al máximo sus posibles fallos, es posible que haya componentes que contengan fallos o no funcionen de la manera esperada.**
