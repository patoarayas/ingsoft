### Nombre caso: Inscribir actividad de titulación
### ID: CU040
#### Actor(es): SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir inscribir una nueva actividad de titulación.
#### Resumen:
El sistema solicita los datos de la actividad de titulacion a inscribir, el usuario los ingresa, el sistema los valida y registra la actividad de titulacion.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historias de usuario: TIT-001

Incluye a: CU011, CU021

#### Curso normal de los eventos


|Accion del usuario | Respuesta del sistema|
|-------------------|----------------------|
|1. Este caso de uso comienza cuando el usuario quiere inscribir una nueva actividad de titulación||
||2. El sistema solicita el titulo de la actividad, el tipo de actividad de las ya existentes, los estudiantes que realizarán la actividad, el académico que la guiará y la fecha de inicio y termino programada|
|3. El usuario ingresa los datos solicitados||
||4. El sistema valida los datos ingresados|
||5. El sistema registra el año y el semestre de inscripcion y guarda la actividad de titulación en estado "INGRESADA"|

|Curso Alternativo|
|-----------------|
|2. Si el tipo de actividad requiere de una organización externa tambien se solicitara el nombre de esta y el nombre del tutor de la empresa.|
|3. Si el usuario ingresa un estudiante que no a sido registrado se le informa y se le permite hacerlo (Continua en CU011)|
|3. Si el usuario ingresa un académico que no ha sido registrado se le informa y se le permite hacerlo (Continua en CU021)|
|3. Si el usuario lo desea puede ingresar otro profesor guía, con un maximo de 2|
|4. Si existe algún dato invalido el sistema informa al usuario y le solicita rectificarlo|




|Excepciones|
|-----------------|
||
