# Casos de uso:

1. (SEC/TIT) Administrar estudiantes

    * 1.1  **extends**: Registrar
    * 1.2  **extends**: Modificar
    * 1.2  **extends**: Eliminar

2. (SEC/TIT) Administrar acádemicos
    * 2.1 **extends**: Registrar
    * 2.2 **extends**: Modificar
    * 2.3 **extends**: Eliminar

3. (SEC/TIT) Administrar tipo de actividad de titulación
    * 3.1 **extends**: Registrar
    * 3.2 **extends**: Modificar
    * 3.3 **extends**: Eliminar

4. (SEC/TIT) Inscribir actividad de titulacion
    * 1.1 **include**: Registrar estudiantes
    * 2.1 **include**: Registrar Academico

5. (TIT) Autorizar actividad de titulación
    * 2.1 **include**: Registrar Academico

6. (SEC/TIT) Registrar inscripción formal

7. (SEC/TIT) Registrar examen de titulo

8. (SEC/TIT) Anular actividad de titulacion

9. (SEC/TIT/ACA)(Consultar actividad de titulacion vigente)
