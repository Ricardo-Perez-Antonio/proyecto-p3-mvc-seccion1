<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/cliente_model.php';

$cliente_id = isset($_GET['cliente_id_del']) ? (int)$_GET['cliente_id_del'] : 0;

// Verificar cliente
$cliente = obtenerClientePorId($cliente_id);

if ($cliente) {
    
    if (eliminarCliente($cliente_id)) {
        echo '
            <script>
                alert("El cliente se eliminó con éxito");
                window.location.href = "index.php?view=cliente_list";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("No se pudo eliminar el cliente, por favor intente nuevamente");
                window.location.href = "index.php?view=cliente_list";
            </script>
        ';
    }
    
} else {
    echo '
        <script>
            alert("El cliente que intenta eliminar no existe");
            window.location.href = "index.php?view=cliente_list";
        </script>
    ';
}
?>