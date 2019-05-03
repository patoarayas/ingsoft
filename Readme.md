# Proyecto ingenieria de software

### Instrucciones para configurar el proyecto
1. Hacer **fork** de este repositorio. En la página de Github en la parte superior derecha hacer click en fork.

2. Clonar el repositorio en la carpeta htdocs de XAMPP, usualmente en `C:/xampp/htdocs`. Usando Github Desktop en la barra superior hacer click en la opción clonar repositorio. Se descargaran los archivos del repositorio en esa carpeta.

3. Abrir el proyecto usando un editor de texto (Atom o Visual Studio Code) y renombrar el archivo `.env.example` a `.env`, este archivo guardara la configuración personal del proyecto.

4. En la terminal en la misma carpete del proyecto se debe ejecutar el comando `composer install` el cual descargará las dependecias necesarias.

5. Luego se debe ejecutar el comando `php artisan key:generate` para generar el key de nuestra aplicación.
