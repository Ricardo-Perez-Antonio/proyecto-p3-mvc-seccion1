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
        alert("El cliente no existe");
        window.location.href = "index.php?view=cliente_list";
    </script>';
    exit();
}

$nombre     = $datos['cliente_nombre'];
$apellido   = $datos['cliente_apellido'];
$cedula     = $datos['cliente_cedula'];
$principal  = $datos['cliente_num'];
$secundario = $datos['cliente_num2'];

// Separar código de área del número
$codigo_principal = '';
$num_principal = $principal;
if (strpos($principal, '-') !== false) {
    list($codigo_principal, $num_principal) = explode('-', $principal);
}

$codigo_secundario = '';
$num_secundario = $secundario;
if (strpos($secundario, '-') !== false) {
    list($codigo_secundario, $num_secundario) = explode('-', $secundario);
}

// Separar tipo de cédula
$tipo_cedula = '';
$num_cedula = $cedula;
if (strpos($cedula, '-') !== false) {
    $tipo_cedula = substr($cedula, 0, strpos($cedula, '-') + 1);
    $num_cedula = str_replace($tipo_cedula, '', $cedula);
}
?>