<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/cliente_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nombre     = strtoupper(trim($_POST['name'] ?? ''));
    $apellido   = strtoupper(trim($_POST['ape'] ?? ''));
    $cedula     = trim(($_POST['cedula'] ?? '') . ($_POST['cedu'] ?? ''));
    $principal  = trim(($_POST['princi'] ?? '') . ($_POST['principal'] ?? ''));
    $secundario = trim(($_POST['secu'] ?? '') . ($_POST['secundario'] ?? ''));
    
    if ($nombre == '' || $apellido == '' || $cedula == '') {
        echo '<script>
            alert("No has llenado todos los campos obligatorios");
            window.location.href = "index.php?view=cliente_new";
        </script>';
        return;
    }
    
    if (existeCedula($cedula)) {
        echo '<script>
            alert("El número de cédula ingresado ya existe");
            window.location.href = "index.php?view=cliente_new";
        </script>';
        return;
    }
    
    if (guardarCliente($cedula, $nombre, $apellido, $principal, $secundario)) {
        echo '<script>
            alert("El cliente se registró correctamente");
            window.location.href = "index.php?view=cliente_list";
        </script>';
    } else {
        echo '<script>
            alert("No se pudo registrar el cliente");
            window.location.href = "index.php?view=cliente_new";
        </script>';
    }
    
} else {
    echo '<script>window.location.href = "index.php?view=cliente_new";</script>';
}
?>