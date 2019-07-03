### Nombre caso: Anular actividad de titulación
### ID: CU080
#### Actor(es):
SECRETARIA, ENCARGADO DE TITULACION
#### Propósito:
Permitir anular una actividad previamente ingresada en estado 'INGRESADA' o 'ACEPTADA'.
#### Resumen:
El usuario selecciona una actividad de titulación en estado 'ACEPTADA' o 'INGRESADA' para anula, el sistema solicita confirmación y cambia el estado de la ctividad a 'ANULADA'.
#### Tipo:
Esencial, Primaria
#### Referencias cruzadas:
Historias de usuario: TIT-005


#### Curso normal de los eventos
|Accion del usuario | Respuesta del sistema|
|-------------------|----------------------|
|1. Este caso de uso comienza cuando el usuario desea anular una actividad de titulación existente y en estado 'ACEPTADA' o 'INGRESADA'||
||2. El sistema solicita confirmar la anulación|
|3. El usuario confirma la anulación||
||4. El sistema cambia el estado de la actividad a 'ANULADA'|


|Curso Alternativo|
|-----------------|
|3. El usuario no confirma la anulación, fin de caso de uso.|




|Excepciones|
|-----------------|
||
