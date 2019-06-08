### Nombre caso: Eliminar tipo de actividad de titulación
### ID: CU033
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir eliminar un tipo de actividad de titulación registrado previamente
#### Resumen:
El usuario selecciona la opción eliminar de un tipo de actividad de titulación existente, el sistema solicita una confirmación, el usuario confirma y el sistema elimina el registro.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historia de usuario: REG-003

Extiende a: CU030

#### Curso normal de los eventos


|Accion del usuario | Respuesta del sistema|
|------------------------------------------|
|1. Este caso de uso comienza cuando el usuario desea eliminar un tipo de actividad de las desplegadas en CU030||
||2. El sistema solicita al usuario que confirme la intención de eliminar el tipo de actividad|
|3. El usuario confirma el deseo de eliminar el tipo de actividad||
||4. El sistema elimina el tipo de actividad e informa al usuario |


|Curso Alternativo|
|-----------------|
|3. El usuario no confirma la intención de eliminar la actividad. Se vuelve a CU030


|Excepciones|
|-----------------|
||
