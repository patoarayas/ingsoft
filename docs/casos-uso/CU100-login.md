### Nombre caso: Login
### ID: CU100
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION, ACADEMICO
#### Propósito:
Permitir a un usuario existente hacer ingreso al sistema
#### Resumen:
El sistema solicita las credenciales, el usuario las ingresa, el sistema las valida y permite el ingreso al sistema según el rol del usuario.
#### Tipo:
Opcional, Esencial
#### Referencias cruzadas:


#### Curso normal de los eventos


|Accion del usuario | Respuesta del sistema|
|------------------------------------------|
|1. Este caso de uso comienza al ingresar al sistema||
||2. El sistema solicita el correo y contraseña al usuario|
|3. El usuario ingresa sus credenciales||
||4. El sistema valida los datos ingresados|
||5. El sistema redirige al usuario a el menú|

|Curso Alternativo|
|-----------------|
|1. Si el usuario ya se encuentra acreditado se le permitira el acceso automaticamente, salta al paso 5|
|3. El usuario puede marcar la casilla 'recordarme' para que el sistema recuerde su acceso|
|4. Si los datos ingresados son invalidos el sistema informará al usuario para que este los rectifique|
|5. Si los datos ingresados no se encuentran registrados el sistema le informara al usuario y lo devolvera al paso 1|


|Excepciones|
|-----------------|
|No hay acceso al servidor web. Despliega error 404|
|No hay acceso a el servidor de base de datos. Despliega error|
