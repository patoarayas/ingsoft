# Casos de uso:

- [x] **CU010** (SEC/TIT) Administrar estudiantes

    * - [x] **CU011**  *extends*: Registrar
    * - [x] **CU012**  *extends*: Modificar
    * - [x] **CU013**  *extends*: Eliminar

- [] **CU020** (SEC/TIT) Administrar acádemicos
    * - [x] **CU021** *extends*: Registrar
    * - [] **CU022** *extends*: Modificar
    * - [] **CU023** *extends*: Eliminar

- [x] **CU030** (SEC/TIT) Administrar tipo de actividad de titulación
    * - [x] **CU031** *extends*: Crear tipo de actividad de titulación
    * - [x] **CU032** *extends*: Editar tipo de actividad de titulación
    * - [x] **CU033** *extends*: Eliminar tipo de actividad de titulación.

- [x] **CU040** (SEC/TIT) Inscribir actividad de titulacion
    * - [x] **CU011** *include*: Registrar estudiantes
    * - [x] **CU021** *include*: Registrar Academico

- [x] **CU050** (TIT) Autorizar actividad de titulación
    * - [] **CU021** *include*: Registrar Academico

- [] **CU060** (SEC/TIT) Registrar inscripción formal

- [] **CU070** (SEC/TIT) Registrar examen de titulo

- [] **CU080** (SEC/TIT) Anular actividad de titulacion

- [] **CU090** (SEC/TIT/ACA)Consultar actividad de titulacion vigente

- [x]  **CU100** (SEC/TIT/ACA) Login
