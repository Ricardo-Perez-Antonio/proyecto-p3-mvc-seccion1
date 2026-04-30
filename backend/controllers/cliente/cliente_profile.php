<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/cliente_model.php';

$id = isset($_GET['cliente_id_up']) ? (int)$_GET['cliente_id_up'] : 0;

if ($id == 0) {
    header('Location: index.php?view=cliente_list');
    exit();
}

$datos = obtenerClientePorId($id);

if (!$datos) {
    echo '<script>
        alert("No podemos obtener la información solicitada");
        window.location.href = "index.php?view=cliente_list";
    </script>';
    exit();
}

$nombre     = $datos['cliente_nombre'];
$apellido   = $datos['cliente_apellido'];
$cedula     = $datos['cliente_cedula'];
$principal  = $datos['cliente_num'];
$secundario = $datos['cliente_num2'];
?>