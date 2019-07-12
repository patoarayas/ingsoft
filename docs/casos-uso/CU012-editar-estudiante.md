### Nombre caso: Editar estudiante
### ID: CU012
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir la edición de los datos asociados a un estudiante.
#### Resumen:
El sistema despliega los datos de el estudiante a editar, el usuario ingresa los cambios deseados, el sistema los valida y los registra.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historias de usuario: REG-001

Extiende a: CU010

#### Curso normal de los eventos


|Accion del usuario | Respuesta del sistema|
|-------------------|----------------------|
|1. Este caso de uso comienza cuando el usuario desea editar la informacion referente a un estudiante ya registrado previamente (Desplegado previamente en CU010)||
||2. El sistema despliega la informacion relacionada al estudiante|
|3. El usuario ingresa la información de los campos que desea modificar||
||4. El sistema valida los datos.|
||5.El sistema registra el nuevo estudiante|

|Curso Alternativo|
|-----------------|
|4. Si existe algún dato invalido el sistema informa al usuario y le solicita rectificarlo|


|Excepciones|
|-----------------|
||
