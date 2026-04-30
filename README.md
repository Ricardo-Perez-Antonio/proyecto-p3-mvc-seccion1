# Proyecto P3 - MVC

## Descripción

Proyecto desarrollado bajo el patrón de arquitectura Modelo-Vista-Controlador (MVC) para la gestión de un taller mecánico.

Nota: Los modulos realizados actualmente son los descritos como "cliente" y "carro"

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
