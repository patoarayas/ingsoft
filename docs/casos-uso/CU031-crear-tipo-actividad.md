### Nombre caso: Crear tipo de actividad de titulación
### ID: CU031
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir crear un nuevo tipo de actividad de titulación
#### Resumen:
El usuario ingresa los datos requeridos para generar una nueva actividad de titulación, el sistema los valida y la registra.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historia de usuario: REG-003

Extiende a: CU030

#### Curso normal de los eventos


|Accion del usuario | Respuesta del sistema|
|------------------------------------------|
| 1. Este caso de uso comienza cuando el usuario desea crea un nuevo tipo de actividad de titulación (Redirigido desde CU030)| |
|| 2. El sistema solicita el nombre de la actividad, la cantidad máxima de estudiantes permitidos, la duración y si requiere de una organización externa |
|3. El usuario ingresa los datos solicitados||
||4. El sistema valida los datos.|
||5.El sistema registra el nuevo tipo de actividad|

|Curso Alternativo|
|-----------------|
|4. Si existe algún dato invalido el sistema informa al usuario y le solicita rectificarlo|


|Excepciones|
|-----------------|
||
