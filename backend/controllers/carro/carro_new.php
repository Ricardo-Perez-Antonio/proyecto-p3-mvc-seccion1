<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/cliente_model.php';

$cliente_id = isset($_GET['cliente_id_up']) ? (int)$_GET['cliente_id_up'] : 0;

if ($cliente_id == 0) {
    header('Location: index.php?view=cliente_list');
    exit();
}

$cliente = obtenerClientePorId($cliente_id);

if (!$cliente) {
    echo '<script>
        alert("No podemos obtener la información solicitada");
        window.location.href = "index.php?view=cliente_list";
    </script>';
    exit();
}
?>