### Nombre caso: Administrar académico
### ID: CU020
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Desplegar los académicos inscritos en el sistema, permitir accesar a las funcionalidades de creación, edición  y eliminación de los mismos.
#### Resumen:
Se despliegan los académicos presentes en el sistema, el usuario puede seleccionar un académico para mostrar en mas detalle o elegir entre crear, editar o eliminar un académico. Tambien accede a una funcionalidad de busqueda que le permite encontrar un académico segun su rut.
#### Tipo:
Esencial, Primario
#### Referencias cruzadas:
Historias de usuario: REG-002

Es extendido por: CU021, CU022, CU023

#### Curso normal de los eventos

|Accion del usuario|Respuesta del sistema|
|------------------|---------------------|
|1. Este caso de uso comienza cuando el usuario selecciona la opción *Administrar académicos*||
||2. El sistema despliega los académicos registrados|
|3.El usuario selecciona un académico de los desplegados.||
||4. El sistema despliega un detalle de la información asociada a ese académico.|

|Curso Alternativo|
|-----------------|
| 3. El usuario desea registrar un nuevo académico. Continuar en CU021|
| 3. El usuario desea editar un académico ya existente. Continua en CU022|
| 3.El usuario desea eliminar un académico ya existente. Continua en CU023|



|Excepciones|
|-----------------|
||
