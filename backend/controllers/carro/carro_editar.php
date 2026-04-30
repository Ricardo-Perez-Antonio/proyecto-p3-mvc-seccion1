<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/carro_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id         = (int)($_POST['carro_id'] ?? 0);
    $vehiculo   = strtoupper(trim($_POST['vehiculo'] ?? ''));
    $matricula  = strtoupper(trim($_POST['matricula'] ?? ''));
    $ano        = trim($_POST['año'] ?? '');
    $color      = strtoupper(trim($_POST['color'] ?? ''));
    $km         = strtoupper(trim($_POST['km'] ?? ''));
    $bateria    = strtoupper(trim($_POST['bateria'] ?? ''));
    
    if ($id == 0 || $vehiculo == '' || $matricula == '' || $color == '' || $ano == '' || $bateria == '') {
        echo '<script>
            alert("No has llenado todos los campos obligatorios");
            window.location.href = "index.php?view=cliente_list";
        </script>';
        return;
    }
    
    $carro = obtenerCarroPorId($id);
    if (!$carro) {
        echo '<script>
            alert("El carro no existe");
            window.location.href = "index.php?view=cliente_list";
        </script>';
        return;
    }
    
    if (actualizarCarro($id, $vehiculo, $matricula, $ano, $color, $km, $bateria)) {
        echo '<script>
            alert("El carro se editó correctamente");
            window.location.href = "index.php?view=cliente_profile&cliente_id_up=' . $carro['carro_cliente'] . '";
        </script>';
    } else {
        echo '<script>
            alert("No se pudo editar el carro");
            window.location.href = "index.php?view=cliente_profile&cliente_id_up=' . $carro['carro_cliente'] . '";
        </script>';
    }
    
} else {
    echo '<script>window.location.href = "index.php?view=cliente_list";</script>';
}
?>