### Nombre caso: Eliminar académico
### ID: CU023
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir eliminar un académico registrado previamente
#### Resumen:
El usuario selecciona la opción eliminar de un académico existente, el sistema solicita una confirmación, el usuario confirma y el sistema elimina el registro.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historias de usuario: REG-002

Extienda a: CU020

#### Curso normal de los eventos

|Accion del usuario | Respuesta del sistema|
|-------------------|----------------------|
|1. Este caso de uso comienza cuando el usuario desea eliminar un académico de los desplegados en CU020||
||2. El sistema solicita al usuario que confirme la intención de eliminar el académico|
|3. El usuario confirma el deseo de eliminar el académico||
||4. El sistema elimina el académico e informa al usuario |

|Curso Alternativo|
|-----------------|
|3. El usuario no confirma la intención de eliminar el académico. Se vuelve a CU020



|Excepciones|
|-----------------|
||
