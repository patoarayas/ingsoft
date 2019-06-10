### Nombre caso: Autorizar actividad de titulación
### ID: CU050
#### Actor(es):
ENCARGADO DE TITULACION
#### Propósito:
Permitir cambiar el estado de una actividad de ingresada a autorizada y asignarle su comisión correctora.
#### Resumen:
El usuario selecciona un trabajo de titulación para autorizar, el sistema solicita las personas que conformarán la comisión correctora, el usuario ingresa los integrantes de la comisión el sistema valida el ingreso, cambia el estado de la actividad a "ACEPTADA" y registra los datos ingresados.
#### Tipo:
Esencial, Primaria
#### Referencias cruzadas:
Historias de usuario: TIT-002

Incluye a: CU021

#### Curso normal de los eventos
|Accion del usuario | Respuesta del sistema|
|-------------------|----------------------|
|1. Este caso de uso comienza cuando el usuario desea autorizar una actividad de titulación||
||2. El sistema solicita ingresar los miembros de la comisión correctora por su rut según halla lugares vacantes en la misma.|
|3. El usuario ingresa los miembros para la comisión correctora ||
||4. El sistema valida los datos ingresados|
|| 5. El sistema cambia el estado de la actividad a "ACEPTADA" y registra la comisión correctora. |

|Curso Alternativo|
|-----------------|
|3. Si el usuario ingresa un rut de un académico que no ha sido registrado previamente se le informa al usuario y se le permite registrarlo continuando en CU021|




|Excepciones|
|-----------------|
||
