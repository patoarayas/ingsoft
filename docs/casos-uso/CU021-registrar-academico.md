### Nombre caso: Registrar académico
### ID: CU021
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir registrar un nuevo académico
#### Resumen:
El usuario ingresa los datos requeridos para registrar un académico, el sistema los valida y registra.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historias de usuario: REG-002

Extienda a: CU020

Incluido en: CU040, CU050

#### Curso normal de los eventos


| Accion del usuario | Respuesta del sistema |
|------------------------------------------|
| 1. Este caso de uso comienza cuando el usuario desea registrar un nuevo académico (Empieza en CU020, CU040, CU050) ||
| | 2. El sistema solicita el rut, nombre y correo electrónico del académico |
| 3. El usuario ingresa los datos solicitados ||
| | 4. El sistema valida los datos |
| | 5.El sistema registra el nuevo estudiante e informa al usuario, también se generan las credenciales que le permitiran al académico acceder al sistema |

| Curso Alternativo |
|-----------------|
| 4. Si existe algún dato invalido el sistema informa al usuario y le solicita rectificarlo |


|Excepciones|
|-----------------|
||
