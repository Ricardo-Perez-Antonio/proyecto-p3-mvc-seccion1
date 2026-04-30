# Proyecto P3 - MVC

## Estructura del Proyecto

```
proyecto-p3-mvc/
│
├── backend/
│   ├── index.php                          ← Punto de entrada principal
│   │
│   ├── controllers/
│   │   ├── iniciar_session.php            ← Login
│   │   ├── logout.php                     ← Cerrar sesión
│   │   │
│   │   ├── cliente/
│   │   │   ├── cliente_guardar.php        ← Crear cliente
│   │   │   ├── cliente_editar.php         ← Editar cliente
│   │   │   ├── cliente_eliminar.php       ← Eliminar cliente
│   │   │   ├── cliente_lista.php          ← Listar clientes
│   │   │   ├── cliente_profile.php        ← Perfil cliente
│   │   │   ├── cliente_update.php         ← Formulario editar
│   │   │   └── cliente_search.php         ← Buscar cliente
│   │   │
│   │   └── carro/
│   │       ├── carro_guardar.php          ← Crear carro
│   │       ├── carro_editar.php           ← Editar carro
│   │       ├── carro_eliminar.php         ← Eliminar carro
│   │       ├── carro_new.php              ← Formulario nuevo carro
│   │       ├── carro_profile.php          ← Perfil carro
│   │       └── carro_update.php           ← Formulario editar carro
│   │
│   ├── models/
│   │   ├── usuario_model.php              ← Conexión BD y usuarios
│   │   ├── cliente_model.php              ← CRUD clientes
│   │   └── carro_model.php                ← CRUD carros
│   │
│   ├── routes/
│   │   └── router.php                     ← Enrutador central
│   │
│   ├── include/
│   │   ├── navegacion.php                 ← Menú de navegación
│   │   └── session_start.php              ← Manejo de sesiones
│   │
│   └── database/                          ← Scripts SQL
│
├── frontend/
│   ├── css/
│   │   ├── navegacion.css                 ← Estilos del menú
│   │   ├── login.css                      ← Estilos login
│   │   ├── home.css                       ← Estilos mensaje login
│   │   ├── cliente_list.css               ← Tabla clientes
│   │   ├── cliente_new.css                ← Formulario cliente
│   │   ├── cliente_profile.css            ← Perfil cliente
│   │   ├── search.css                     ← Buscador
│   │   ├── carro_new.css                  ← Formulario carro
│   │   └── carro_profile.css              ← Perfil carro
│   │
│   ├── img/
│   │   ├── logotaller.png
│   │   └── cliente.png
│   │
│   └── view/
│       ├── plantilla.php                  ← HTML base (head, header, main)
│       ├── login.php                      ← Formulario login
│       ├── home.php                       ← Panel de bienvenida
│       ├── 404.php                        ← Página no encontrada
│       ├── logout.php
│       │
│       ├── cliente/
│       │   ├── cliente_list.php           ← Tabla clientes
│       │   ├── cliente_new.php            ← Formulario crear
│       │   ├── cliente_profile.php        ← Perfil cliente
│       │   ├── cliente_search.php         ← Buscador
│       │   └── cliente_update.php         ← Formulario editar
│       │
│       └── carro/
│           ├── carro_new.php              ← Formulario crear
│           ├── carro_profile.php          ← Perfil carro
│           └── carro_update.php           ← Formulario editar
│
├── index.php                              ← Redirige a backend/
├── crear_admin.php                        ← Script temporal para pruebas
└── README.md
```

## Descripción

Proyecto desarrollado bajo el patrón de arquitectura Modelo-Vista-Controlador (MVC) para la gestión de un taller mecánico.

Nota: Los modulos realizados actualmente son los descritos como "cliente" y "carro"

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
3. Actualizar las credenciales de base de datos en los archivos de configuración
4. Acceder a través del navegador web

## Licencia

Proyecto educativo para fines de aprendizaje.
