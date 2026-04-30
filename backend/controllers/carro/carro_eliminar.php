<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/carro_model.php';

$carro_id = isset($_GET['carro_id_del']) ? (int)$_GET['carro_id_del'] : 0;

if ($carro_id == 0) {
    echo '<script>
        alert("ID de carro no válido");
        window.location.href = "index.php?view=cliente_list";
    </script>';
    return;
}

$carro = obtenerCarroPorId($carro_id);

if (!$carro) {
    echo '<script>
        alert("El carro no existe");
        window.location.href = "index.php?view=cliente_list";
    </script>';
    return;
}

if (eliminarCarro($carro_id)) {
    echo '<script>
        alert("El carro se eliminó con éxito");
        window.location.href = "index.php?view=cliente_profile&cliente_id_up=' . $carro['carro_cliente'] . '";
    </script>';
} else {
    echo '<script>
        alert("No se pudo eliminar el carro");
        window.location.href = "index.php?view=cliente_list";
    </script>';
}
?>