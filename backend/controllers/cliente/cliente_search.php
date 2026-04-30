<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/cliente_model.php';

if (isset($_POST['modulo_buscador']) && $_POST['modulo_buscador'] == 'cliente') {
    if (isset($_POST['eliminar_buscador'])) {
        unset($_SESSION['busqueda_cliente']);
    } else {
        $txt_buscador = $_POST['txt_buscador'] ?? '';
        if (!empty($txt_buscador)) {
            $_SESSION['busqueda_cliente'] = $txt_buscador;
        }
    }
}

$busqueda = $_SESSION['busqueda_cliente'] ?? '';

if (!empty($busqueda)) {
    $pagina = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($pagina < 1) $pagina = 1;
    
    $registros = 15;
    $inicio = ($pagina - 1) * $registros;
    
    $datos = listarClientes($inicio, $registros, $busqueda);
    $total = contarClientes($busqueda);
    $Npaginas = ceil($total / $registros);
    $url = "index.php?view=cliente_search&page=";
}
?>