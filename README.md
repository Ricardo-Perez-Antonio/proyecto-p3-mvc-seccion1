# Proyecto P3 - MVC

## Descripción

Proyecto desarrollado bajo el patrón de arquitectura Modelo-Vista-Controlador (MVC) 

Este sistema es una plataforma web integral diseñada para digitalizar y optimizar los procesos administrativos, operativos y de inventario de talleres mecánicos. El proyecto surge como respuesta a la gestión manual (basada en papel) detectada en el taller Europitsccs (Caracas), con el fin de eliminar la fragmentación de datos y mejorar la eficiencia operativa.

Nota: Los modulos realizados actualmente son los descritos como "cliente" y "carro"

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
