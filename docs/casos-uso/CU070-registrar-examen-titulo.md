### Nombre caso: Registrar examen de título
### ID: CU070
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir agregar una fecha de examen de tiutlo y una nota a una actividad en estado 'ACEPTADA'. Cambia el estado de la actividad a 'FINALIZADA'
#### Resumen:
El usuario selecciona una actividad de titulación en estado 'ACEPTADA', el sistema solicita la fecha de el examen de título y la nota obtenida, el usuario lo ingresa, el sistema valida el ingreso,y registra el dato ingresados. Cambia el estado de la actividad a 'FINALIZADA'
#### Tipo:
Esencial, Primaria
#### Referencias cruzadas:
Historias de usuario: TIT-004


#### Curso normal de los eventos
|Accion del usuario | Respuesta del sistema|
|-------------------|----------------------|
|1. Este caso de uso comienza cuando el usuario desea registrar la fecha del examen de título y su nota a una actividad de titulación existente y en estado 'ACEPTADA'||
||2. El sistema solicita ingresar la nota y la fecha del examen de título.|
|3. El usuario ingresa los datos||
||4. El sistema valida los datos ingresados|
|| 5.El sistema registra la fecha del examen y la nota, cambia el estado de la actividad a 'FINALIZADA'. |

|Curso Alternativo|
|-----------------|
||




|Excepciones|
|-----------------|
||
