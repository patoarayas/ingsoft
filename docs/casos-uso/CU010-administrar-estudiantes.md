### Nombre caso: Administrar estudiante
### ID: CU010
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Desplegar los estudiantes inscritos en el sistema, permitir accesar a las funcionalidades de creación, edición  y eliminación de los mismos.
#### Resumen:
Se despliegan los estudiantes presentes en el sistema, el usuario puede seleccionar un estudiante para mostrar en mas detalle o elegir entre crear, editar o eliminar un estudiante. Tambien accede a una funcionalidad de busqueda que le permite encontrar un estudiante segun su rut.
#### Tipo:
Primario, Esencial
#### Referencias cruzadas:
Historias de usuario: REG-001

Es extendido por: CU011, CU012, CU013

#### Curso normal de los eventos


|Accion del usuario|Respuesta del sistema|
|------------------|---------------------|
|1. Este caso de uso comienza cuando el usuario selecciona la opción *Administrar estudiantes*||
||2. El sistema despliega los estudiantes registrados|
|3.El usuario selecciona un estudiante de los desplegados.||
||4. El sistema despliega un detalle de la información asociada a ese estudiante.|

|Curso Alternativo|
|-----------------|
| 3. El usuario desea registrar un nuevo estudiante. Continuar en CU011|
| 3. El usuario desea editar un estudiante ya existente. Continua en CU012|
| 3.El usuario desea eliminar un estudiante ya existente. Continua en CU013|


|Excepciones|
|-----------------|
||
