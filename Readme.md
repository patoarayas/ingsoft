# Proyecto ingenieria de software

### Instrucciones para configurar el proyecto
1. Hacer **fork** de este repositorio. En la página de Github en la parte superior derecha hacer click en fork.

2. Clonar el repositorio en la carpeta htdocs de XAMPP, usualmente en `C:/xampp/htdocs`. Usando Github Desktop en la barra superior hacer click en la opción clonar repositorio. Se descargaran los archivos del repositorio en esa carpeta.

3. Abrir el proyecto usando un editor de texto (Atom o Visual Studio Code) y renombrar el archivo `.env.example` a `.env`, este archivo guardara la configuración personal del proyecto.

4. En la terminal en la misma carpete del proyecto se debe ejecutar el comando `composer install` el cual descargará las dependecias necesarias.

5. Luego se debe ejecutar el comando `php artisan key:generate` para generar el key de nuestra aplicación.

6. (Opcional) Laravel ademas de usar composer tambien hace uso de nmp para manejar las dependencias ligadas a javascript, hasta ahora no hemos encontrado que sea un problema, en todo caso si fuese necesario se debe instalar `node.js` el cual incluye npm desde [aquí](https://nodejs.org/es/) y luego desde la terminal en la carpeta de proyecto hacer `npm install` igual como se hizo con composer.

### Instrucciones para trabajar en el proyecto

Ya habiendo hecho un **fork** de el proyecto y clonado el mismo en el PC se puede trabajar directamente en el proyecto, eso si para que se haga mas organizado el desarrollo tener algunas consideraciones.

1. Desarrollar de a una funcionalidad (No ir haciendo pequeños cambios a todo el proyecto, enfocarse en una cosa a la vez), esto para poder tener un mejor seguimiento del desarrollo y hacer mas sencillo el arreglo de un error de producirse.

2. Antes de empezar a trabajar en una funcionalidad hacer **fetch** y luego **merge** para sincronizar el repositorio a la ultima versión.
    * Desde la terminal `git fetch upstream` y  `git merge upstream/master`
    * Desde Github Desktop, hacer click en fetch origin en la barra superior y luego primero fijarse que
    la *current branch* sea **master**, hacer click en ese botón y seleccionar `Choose a branch to merge into master`, en el menú que se despliega seleccionar **usptream/master**, para terminar hacer push para que quede guardado en *origin* (el repositorio en github).

3. Hacer commit cada vez que se agrege un cambio importante, en el mensaje del commit hacer una breve descripcion de los cambios.
4. En  culaquier momento del desarrollo hacer **push** para que se guarden los commit en tu repositorio en **GitHub**
5. Cuando finalizes la funcionalidad avisar para que el resto pueda revisarla asi preparar el **Pull Request** para añadir los cambios en el repositorio de producción.
6. Luego volver al paso 1.
