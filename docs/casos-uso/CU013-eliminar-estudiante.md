### Nombre caso: Eliminar estudiante
### ID: CU013
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir eliminar un estudiante inscrito previamente.
#### Resumen:
El usuario selecciona la opción eliminar de un estudiante existente, el sistema solicita una confirmación, el usuario confirma y el sistema elimina el registro.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historias de usuario: REG-001

Exitende a: CU010

#### Curso normal de los eventos


|Accion del usuario | Respuesta del sistema|
|-------------------|----------------------|
|1. Este caso de uso comienza cuando el usuario desea eliminar un estudiante de los desplegados en CU010||
||2. El sistema solicita al usuario que confirme la intención de eliminar el estudiante|
|3. El usuario confirma el deseo de eliminar el estudiante||
||4. El sistema elimina el estudiante e informa al usuario |

|Curso Alternativo|
|-----------------|
|3. El usuario no confirma la intención de eliminar el estudiante. Se vuelve a CU010


|Excepciones|
|-----------------|
||
