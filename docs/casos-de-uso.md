# Casos de uso:

- **CU010** (SEC/TIT) Administrar estudiantes

    * **CU011**  *extends*: Registrar
    * **CU012**  *extends*: Modificar
    * **CU012**  *extends*: Eliminar

- **CU020** (SEC/TIT) Administrar acádemicos
    * **CU021** *extends*: Registrar
    * **CU022** *extends*: Modificar
    * **CU023** *extends*: Eliminar

- **CU030** (SEC/TIT) Administrar tipo de actividad de titulación
    * **CU031** *extends*: Registrar
    * **CU032** *extends*: Modificar
    * **CU033** *extends*: Eliminar

- **CU040** (SEC/TIT) Inscribir actividad de titulacion
    * **CU011** *include*: Registrar estudiantes
    * **CU021** *include*: Registrar Academico

- **CU050** (TIT) Autorizar actividad de titulación
    * **CU021** *include*: Registrar Academico

- **CU060** (SEC/TIT) Registrar inscripción formal

- **CU070** (SEC/TIT) Registrar examen de titulo

- **CU080** (SEC/TIT) Anular actividad de titulacion

- **CU090** (SEC/TIT/ACA)(Consultar actividad de titulacion vigente)
