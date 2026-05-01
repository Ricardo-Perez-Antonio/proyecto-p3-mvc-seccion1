# Proyecto P3 - MVC

## Descripción

Proyecto desarrollado bajo el patrón de arquitectura Modelo-Vista-Controlador (MVC) 

Este sistema es una plataforma web integral diseñada para digitalizar y optimizar los procesos administrativos, operativos y de inventario de talleres mecánicos. El proyecto surge como respuesta a la gestión manual (basada en papel) detectada en el taller Europitsccs (Caracas), con el fin de eliminar la fragmentación de datos y mejorar la eficiencia operativa.

Nota: Los modulos realizados actualmente son los descritos como "cliente" y "carro"

## Diagnóstico Inicial del Proyecto

### Situación Actual y Problemática

El taller mecánico Europitsccs opera actualmente bajo un esquema de gestión tradicional basado en métodos manuales y registros físicos en papel. Esta situación genera las siguientes debilidades críticas:  
- Fragmentación de la información: No existe una base de datos centralizada, lo que impide consultar historiales de servicios, garantías o recurrencia de fallas de los vehículos.
  
- Inconsistencia en el inventario: La falta de un catálogo normalizado (como el uso de números OEM) provoca desorganización, pérdida de datos sobre repuestos utilizados y dificultades para gestionar el stock mínimo.
  
- Limitación operativa: La ausencia de trazabilidad en las órdenes de servicio dificulta la asignación de tareas a los mecánicos y el seguimiento de los tiempos de reparación.

- Atención al cliente reactiva: El control limitado sobre las citas y el estado de las reparaciones reduce la capacidad de fidelización y transparencia hacia el cliente.
  
### Necesidades Identificadas

Para transformar la operatividad de la comunidad, se han detectado las siguientes prioridades:  

1. Digitalización Integral: Sustituir los registros físicos por un sistema web que integre clientes, vehículos, órdenes e inventario.
   
2. Trazabilidad Técnica: Implementar un catálogo por número de pieza del fabricante y un historial unificado por vehículo.

3. Gestión de Indicadores: Generar tableros de control (KPIs) en tiempo real para medir la productividad del personal y la rentabilidad por servicio.

4. Capacitación Tecnológica: Formar al personal en el uso de herramientas digitales para reducir el error humano y asegurar la continuidad operativa.  

## Impacto Comunitario

- Taller: Incremento de la productividad y reducción de errores humanos.
- Clientes: Mayor transparencia en las garantías y mejor comunicación sobre el estado de sus vehículos.
- Académico: Promoción del uso de tecnologías libres y aplicación práctica de ingeniería en sistemas para el desarrollo local.

## ¿Para qué sirve?

El sistema centraliza la operación del taller en un entorno digital, permitiendo:

- Control de Clientes y Vehículos: Mantiene un historial unificado de servicios, cambios de propietario y recurrencia de fallas.
- Gestión de Órdenes de Servicio (OS): Seguimiento en tiempo real de tareas por mecánico y estados de reparación mediante un panel visual.
- Control de Inventario Inteligente: Catálogo basado en números de parte OEM, con alertas de stock mínimo y trazabilidad de repuestos por servicio.
- Toma de Decisiones: Dashboard con indicadores clave (KPIs) sobre productividad, rentabilidad y tiempos de respuesta.  

## Arquitectura MVC

```
Petición del usuario
│
▼
index.php (punto de entrada)
│
▼
Router ─── ¿Ruta válida? ─── No ──► 404
│
Sí
│
▼
Controlador ─── Lógica de negocio
│
├──► Modelo ─── Consultas SQL ─── Base de datos
│
└──► Vista ─── HTML + variables
│
▼
Respuesta al usuario
```

## Responsabilidades por capa

### Modelo ('backend/models/')
- Conexión a la base de datos
- Consultas preparadas con PDO
- Funciones CRUD: listar, crear, actualizar, eliminar, contar

### Controlador ('backend/controllers/')
- Recibe parámetros por GET y POST
- Valida y limpia datos de entrada
- Llama a funciones del modelo
- Prepara variables para la vista

### Vista ('frontend/view/')
- Solo HTML y PHP de presentación ('echo', 'foreach', 'if')
- Sin consultas SQL ni 'require' de modelos
- Variables vienen del controlador
- CSS e imágenes desde 'frontend/'

### Router ('backend/routes/')
- Lista blanca de vistas permitidas
- Separa vistas públicas y privadas
- Verifica sesión para rutas protegidas


## Características

- Gestión de clientes
- Gestión de vehículos
- Gestión de mecánicos
- Sistema de autenticación
- Interfaz responsive

## Requisitos

- PHP 7.4 o superior
- MySQL/MariaDB
- Servidor web Apache

## Instalación

1. Clonar el proyecto en el directorio del servidor web
2. Configurar la base de datos usando los scripts en `backend/database/`
3. Crear usuario administrador con `crear_admin.php` ubicado en la carpeta raiz, el archivo creará el usuario `juan` con la contraseña `1234`. 
4. Acceder a través del navegador web

## Licencia

Proyecto educativo para fines de aprendizaje.

## cambios realizados

- Separar el proyecto en backend (lógica) y frontend (vistas)
- Crear enrutador central en backend/routes/router.php
- Extraer consultas SQL a modelos por tabla (usuario, cliente, carro)
- Mover lógica de negocio a controladores por módulo (cliente/, carro/)
- Limpiar las vistas quitando consultas SQL y require de modelos
- Implementar login con hash y validación contra base de datos
- Implementar clientes: CRUD, búsqueda, paginación
- Implementar carros: CRUD asociado a cliente
- Unificar redirecciones con header() y window.location
- Usar __DIR__ para rutas portables
- Separar plantilla HTML base (head, header, main) de las vistas de contenido
- Implementar validación de sesión para rutas protegidas
- Mejorar mensajes de error en login con diseño CSS
- Organizar CSS por vista con carga dinámica desde plantilla
- Mover vistas a subcarpetas por módulo (cliente/, carro/)
- Eliminar dependencia de main.php unificando conexión en usuario_model
