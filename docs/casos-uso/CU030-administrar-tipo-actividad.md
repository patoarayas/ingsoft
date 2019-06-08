### Nombre caso: Administrar tipo de actividad de titulación
### ID: CU030
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Desplegar los tipos de actividades de titulación en el sistema, permitir accesar a las funcionalidades de creación, edición  y eliminación de los mismos.
#### Resumen:
Se despliegan los tipos de actividades de titulación en el sistema, el usuario puede seleccionar un tipo de actividad de titulación para mostrar en mas detalle o elegir entre crear, editar o eliminar un tipo de actividad de titulación.
#### Tipo:
Primario, Esencial
#### Referencias cruzadas:
Historia de usuario: REG-003

Es extendido por: CU031, CU032, CU033

#### Curso normal de los eventos


|Accion del usuario | Respuesta del sistema|
|-------------------|-----------------------|
| 1. Este caso de uso comienza cuando el usuario selecciona la opcion Administrar tipo de actividad de titulación.||
|| 2. El sistema despliega todos los tipos de actividad de titulación disponibles en el sistema|
|3. El usuario selecciona un tipo de actividad de titulación ||
||4. El sistema despliega un detalle de la informacion relacionada a el tipo de actividad de titulación seleccionado|




|Curso Alternativo|
|-----------------|
| 3. El usuario desea crear un nuevo tipo de actividad de titulación. Continuar en CU031|
| 3. El usuario desea editar un tipo de actividad de titulación ya existente. Continua en CU032|
| 3.El usuario desea eliminar un tipo de actividad ya existente. Continua en CU033|


|Excepciones|
|-----------------|
|No hay acceso al servidor web. Despliega error 404|
|No hay acceso a el servidor de base de datos. Despliega error|
|El usuario no tiene privilegios para administrar tipos de actividades de titulación. Redirige al usuario al login|
