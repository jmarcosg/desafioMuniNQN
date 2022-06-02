# Desafío Secretaría de Modernización, Municipalidad Neuquén 
## Desafío propuesto 

Se debe realizar una petición a un Endpoint el cual le otorgará información sobre 100 personas en una DB.

Una vez obtenidos los datos, se necesita que realice las siguientes tareas:

- Crear un CRUD o ABM web que permita inscribir personas a cursos de capacitación, con las siguientes restricciones y requerimientos:
  - Para las personas se pide registrar su nombre, apellido, DNI, género y edad. No puede haber personas duplicadas en el sistema (insertar los datos consumidos desde la api).
  - De los cursos se sabe que poseen un legajo, un nombre que le permite a un usuario poder reconocerlo, una descripción que permite conocer el detalle del mismo y su modalidad, la cual puede ser grupal o individual.
  - Un curso no puede contener 2 modalidades diferentes, es decir, es grupal o es individual. Tampoco puede haber cursos duplicados.
  - Una persona se puede inscribir a 1 solo curso por modalidad.

Emitir un reporte por pantalla de personas por curso.
- Listar por separado los cursos individuales y grupales, mostrar los nombres en orden de la lista creada, a un costado de la misma, solo que el nombre que se muestra debe estar en grande, cambiar cada 10-15 segundos (si es posible animar tanto cuando desaparece el nombre como cuando aparece el próximo) y debe corresponder con el nombre en la lista.
- Obtener cantidad de mujeres y hombres.
- Obtener cantidad de menores y mayores de edad.

![](https://cdn.discordapp.com/attachments/938426490847117352/981781236626358313/Logo-SMGP-FI.png)

