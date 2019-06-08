# Casos de uso:

- [] **CU010** (SEC/TIT) Administrar estudiantes

    * - [] **CU011**  *extends*: Registrar
    * - [] **CU012**  *extends*: Modificar
    * - [] **CU013**  *extends*: Eliminar

- [] **CU020** (SEC/TIT) Administrar acádemicos
    * - [] **CU021** *extends*: Registrar
    * - [] **CU022** *extends*: Modificar
    * - [] **CU023** *extends*: Eliminar

- [x] **CU030** (SEC/TIT) Administrar tipo de actividad de titulación
    * - [x] **CU031** *extends*: Crear tipo de actividad de titulación
    * - [x] **CU032** *extends*: Editar tipo de actividad de titulación
    * - [x] **CU033** *extends*: Eliminar tipo de actividad de titulación.

- [] **CU040** (SEC/TIT) Inscribir actividad de titulacion
    * - [] **CU011** *include*: Registrar estudiantes
    * - [] **CU021** *include*: Registrar Academico

- [] **CU050** (TIT) Autorizar actividad de titulación
    * - [] **CU021** *include*: Registrar Academico

- [] **CU060** (SEC/TIT) Registrar inscripción formal

- [] **CU070** (SEC/TIT) Registrar examen de titulo

- [] **CU080** (SEC/TIT) Anular actividad de titulacion

- [] **CU090** (SEC/TIT/ACA)Consultar actividad de titulacion vigente

- []  **CU100** (SEC/TIT/ACA) Login
