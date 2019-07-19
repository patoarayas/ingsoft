### Nombre caso: Editar académico
### ID: CU022
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir editar un académico registrado previamente
#### Resumen:
El sistema despliega los datos de el académico a editar, el usuario ingresa los cambios deseados, el sistema los valida y los registra.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historias de usuario: REG-002

Extienda a: CU020

|Accion del usuario | Respuesta del sistema|
|-------------------|----------------------|
|1. Este caso de uso comienza cuando el usuario desea editar la informacion referente a un académico ya registrado previamente (Desplegado previamente en CU020)||
||2. El sistema despliega la informacion relacionada al académico|
|3. El usuario ingresa la información de los campos que desea modificar||
||4. El sistema valida los datos.|
||5.El sistema registra el nuevo académico|

|Curso Alternativo|
|-----------------|
|4. Si existe algún dato invalido el sistema informa al usuario y le solicita rectificarlo|

|Excepciones|
|-----------------|
||
