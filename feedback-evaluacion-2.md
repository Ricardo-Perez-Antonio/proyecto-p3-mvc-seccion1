Título:
Retroalimentación Evaluación 2 - Arquitectura y MVC

Contenido:
Equipo 6 - Evaluación 2

Calificación: 16/20 para:
CALERO ALFARO	JUAN DANIEL
LOAIZA MANZANARES	SANTIAGO DAVID
RICARDO ANTONIO	PEREZ ZAMBRANO

Calificación: 13/20 para:
ANGEL DAVID	PEREZ ROSALES (no se observó en commits ni como colaborador)

Desglose:
- Análisis del sistema actual: 5/6
- Diseño propuesto MVC: 3.5/4
- Implementación MVC: 4.5/6
- Uso de Git: 1/2
- README: 1.8/2

Fortalezas:
El grupo presenta una entrega bien documentada y alineada con el objetivo de la evaluación. El README explica claramente el problema del taller Europitsccs, la gestión manual, la fragmentación de información, la falta de trazabilidad y la necesidad de digitalizar procesos administrativos, operativos e inventario.

También se valora positivamente que expliquen la arquitectura MVC, el flujo desde index.php hacia el router, controlador, modelo y vista, así como las responsabilidades de cada capa. Esto demuestra comprensión conceptual del patrón.

En la implementación se observa trabajo real en los módulos de cliente y carro. Hay separación entre backend y frontend, uso de router central, controladores, modelos con consultas PDO y vistas separadas. Además, los commits revisados tienen mensajes descriptivos como refactor y fix, relacionados con migración MVC, corrección de rutas y módulos específicos.

Aspectos a mejorar:
Aunque la estructura MVC está presente, todavía hay detalles de separación de responsabilidades que deben corregirse. Por ejemplo, algunos controladores construyen HTML directamente, como ocurre en el listado de clientes, donde se arma una tabla desde el controlador. Esa lógica debería estar principalmente en la vista, recibiendo los datos ya preparados.

El archivo backend/index.php funciona como punto de entrada, pero contiene muchos condicionales para decidir qué controlador cargar. Para una versión más escalable, sería recomendable fortalecer el router y reducir esa lógica manual.

En cuanto al uso de Git, se observan commits descriptivos y dentro del plazo, pero no se pudo confirmar claramente que los 4 integrantes hayan realizado commits propios con nombres reales. Esa era una condición importante de la evaluación.

Recomendación:
Mantener la estructura MVC, mover la construcción de HTML desde los controladores hacia las vistas, fortalecer el sistema de rutas y asegurar que todos los integrantes participen en Git con commits propios e identificables.
