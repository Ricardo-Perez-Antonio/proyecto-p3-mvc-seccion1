<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/carro_model.php';

$id = isset($_GET['carro_id_up']) ? (int)$_GET['carro_id_up'] : 0;

if ($id == 0) {
    header('Location: index.php?view=cliente_list');
    exit();
}

$datos = obtenerCarroPorId($id);

if (!$datos) {
    echo '<script>
        alert("No podemos obtener la información solicitada");
        window.location.href = "index.php?view=cliente_list";
    </script>';
    exit();
}

$vehiculo  = $datos['carro_vehiculo'];
$matricula = $datos['carro_matricula'];
$ano       = $datos['carro_año'];
$color     = $datos['carro_color'];
$km        = $datos['carro_kilometraje'];
$bateria   = $datos['carro_serial_bateria'];
?>