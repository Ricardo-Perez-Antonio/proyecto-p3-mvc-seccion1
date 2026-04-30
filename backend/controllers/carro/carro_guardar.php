<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/cliente_model.php';
require_once __DIR__ . '/../../models/carro_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $cliente_id = (int)($_POST['cliente_id'] ?? 0);
    $vehiculo   = strtoupper(trim($_POST['vehiculo'] ?? ''));
    $matricula  = strtoupper(trim($_POST['matricula'] ?? ''));
    $ano        = trim($_POST['año'] ?? '');
    $color      = strtoupper(trim($_POST['color'] ?? ''));
    $km         = strtoupper(trim($_POST['km'] ?? ''));
    $bateria    = strtoupper(trim($_POST['bateria'] ?? ''));
    
    if ($vehiculo == '' || $matricula == '' || $color == '' || $ano == '' || $bateria == '') {
        echo '<script>
            alert("No has llenado todos los campos obligatorios");
            window.location.href = "index.php?view=cliente_list";
        </script>';
        return;
    }
    
    $cliente = obtenerClientePorId($cliente_id);
    if (!$cliente) {
        echo '<script>
            alert("El cliente no existe");
            window.location.href = "index.php?view=cliente_list";
        </script>';
        return;
    }
    
    if (guardarCarro($vehiculo, $matricula, $ano, $color, $km, $bateria, $cliente_id)) {
        echo '<script>
            alert("El carro se registró correctamente");
            window.location.href = "index.php?view=cliente_profile&cliente_id_up=' . $cliente_id . '";
        </script>';
    } else {
        echo '<script>
            alert("No se pudo registrar el carro");
            window.location.href = "index.php?view=cliente_profile&cliente_id_up=' . $cliente_id . '";
        </script>';
    }
    
} else {
    echo '<script>window.location.href = "index.php?view=cliente_list";</script>';
}
?>