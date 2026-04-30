<?php

function obtenerView() {
    
    if (isset($_GET['url'])) {
        $view = $_GET['url'];
    } elseif (isset($_GET['view'])) {
        $view = $_GET['view'];
    } else {
        $view = '';
    }
    
    $view = rtrim($view, '/');
    
    if ($view == '') {
        $view = 'login';
    }
    
    $views_publicas = ['login', 'logout', '404', 'iniciar-sesion'];
    
    if (!in_array($view, $views_publicas)) {
        if (!tieneSesion()) {
            $view = 'login';
        }
    }
    
    $views_permitidas = [
    'login', 'logout', 'home', '404',
    'iniciar-sesion',
    'cliente_guardar', 'cliente_eliminar', 'cliente_editar',
    'cambiar_credenciales',
    'cliente_list', 'cliente_new', 'cliente_profile', 'cliente_search', 'cliente_update',
    'mecanico_list', 'mecanico_new', 'mecanico_profile', 'mecanico_search', 'mecanico_update',
    'carro_new', 'carro_profile', 'carro_update',
    'inventario_list', 'producto_new', 'producto_search',
    'user_list', 'user_new'
];
    
    if (!in_array($view, $views_permitidas)) {
        $view = '404';
    }
    
    return $view;
}

function tieneSesion() {
    return (
        isset($_SESSION['id']) && $_SESSION['id'] != "" &&
        isset($_SESSION['usuario']) && $_SESSION['usuario'] != "" &&
        isset($_SESSION['rol']) && $_SESSION['rol'] != ""
    );
}

function esViewPublica($view) {
    return in_array($view, ['login', 'logout', '404', 'iniciar-sesion']);
}
?>