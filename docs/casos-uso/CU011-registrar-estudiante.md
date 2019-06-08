### Nombre caso: Registrar estudiante
### ID: CU011
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir registrar un nuevo estudiante.
#### Resumen:
El usuario ingresa los datos requeridos para registrar un estudiante, el sistema los valida y registra.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historias de usuario: REG-001

Extienda a: CU010

Incluido en: CU040

#### Curso normal de los eventos
|Accion del usuario | Respuesta del sistema|
|------------------------------------------|
|1. Este caso de uso comienza cuando el usuario desea registrar un nuevo estudiante (Empieza en CU010 o CU040)||
||2. El sistema solicita el rut, nombre, carrera, correo electrónico y teléfono de contacto|
|3. El usuario ingresa los datos solicitados||
||4. El sistema valida los datos|
||5.El sistema registra el nuevo estudiante e informa al usuario|

|Curso Alternativo|
|-----------------|
|3. El usuario puede ingresar mas de una carrera|
|4. Si existe algún dato invalido el sistema informa al usuario y le solicita rectificarlo|


|Excepciones|
|-----------------|
||
