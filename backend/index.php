<?php
/**
 * Punto de entrada - Backend
 */
require __DIR__ . '/include/session_start.php';
require __DIR__ . '/routes/router.php';

define('RUTA_VIEWS', __DIR__ . '/../frontend/view/');

$view = obtenerView();

// Función para encontrar la vista
function encontrarVista($view, $RUTA_VIEWS) {
    $carpetas = ['cliente', 'mecanico', 'carro', 'inventario', 'usuario'];
    foreach ($carpetas as $carpeta) {
        $ruta = $RUTA_VIEWS . $carpeta . '/' . $view . '.php';
        if (file_exists($ruta)) return $ruta;
    }
    return $RUTA_VIEWS . $view . '.php';
}

$archivo_vista = encontrarVista($view, RUTA_VIEWS);

// ============ CONTROLADORES ============

// Autenticación
if ($view == 'iniciar-sesion') {
    require __DIR__ . '/controllers/iniciar_session.php';
    procesarLogin();
    exit();
}

if ($view == 'logout') {
    require __DIR__ . '/controllers/logout.php';
    cerrarSesion();
    exit();
}

// Clientes
if ($view == 'cliente_guardar') {
    require __DIR__ . '/controllers/cliente/cliente_guardar.php';
    return;
}

if ($view == 'cliente_editar') {
    require __DIR__ . '/controllers/cliente/cliente_editar.php';
    return;
}

if ($view == 'cliente_eliminar') {
    require __DIR__ . '/controllers/cliente/cliente_eliminar.php';
    return;
}

if ($view == 'cliente_list') {
    require __DIR__ . '/controllers/cliente/cliente_lista.php';
}

if ($view == 'cliente_profile') {
    require __DIR__ . '/controllers/cliente/cliente_profile.php';
}

if ($view == 'cliente_update') {
    require __DIR__ . '/controllers/cliente/cliente_update.php';
}

if ($view == 'cliente_search') {
    require __DIR__ . '/controllers/cliente/cliente_search.php';
}

// ============ CARGAR PLANTILLA ============
$es_publica = esViewPublica($view);
include RUTA_VIEWS . 'plantilla.php';
?>