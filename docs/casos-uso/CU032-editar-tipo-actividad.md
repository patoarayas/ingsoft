### Nombre caso: Editar tipo de actividad de titulación
### ID:CU032
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir la edición de los datos de un tipo de actividad de titulación ingresado anteriormente.
#### Resumen:
El sistema despliega los datos de el tipo de actividad de titulación a editar, el usuario ingresa los cambios deseados, el sistema los valida y los registra.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historia de usuario: REG-003

Extiende a:CU030
#### Curso normal de los eventos


|Accion del usuario | Respuesta del sistema|
|-------------------|----------------------|
|1. Este caso de uso comienza cuando el usuario desea editar la informacion referente a un tipo de actividad ya registrada previamente (Desplegada previamente en CU030)||
||2. El sistema despliega la informacion relacionada al tipo de actividad de titulación|
|3. El usuario ingresa la información de los campos que desea modificar||
||4. El sistema valida los datos.|
||5.El sistema registra el nuevo tipo de actividad|

|Curso Alternativo|
|-----------------|
|4. Si existe algún dato invalido el sistema informa al usuario y le solicita rectificarlo|


|Excepciones|
|-----------------|
||
