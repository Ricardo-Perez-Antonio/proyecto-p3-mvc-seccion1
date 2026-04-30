<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/cliente_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id         = (int)($_POST['cliente_id'] ?? 0);
    $nombre     = strtoupper(trim($_POST['name'] ?? ''));
    $apellido   = strtoupper(trim($_POST['ape'] ?? ''));
    $cedula     = trim(($_POST['cedula'] ?? '') . ($_POST['cedu'] ?? ''));
    $principal  = trim(($_POST['princi'] ?? '') . ($_POST['principal'] ?? ''));
    $secundario = trim(($_POST['secu'] ?? '') . ($_POST['secundario'] ?? ''));
    
    if ($id == 0 || $nombre == '' || $apellido == '' || $cedula == '') {
        echo '<script>
            alert("No has llenado todos los campos obligatorios");
            window.location.href = "index.php?view=cliente_update&cliente_id_up=' . $id . '";
        </script>';
        exit();
    }
    
    $cliente = obtenerClientePorId($id);
    if (!$cliente) {
        echo '<script>
            alert("El cliente no existe");
            window.location.href = "index.php?view=cliente_list";
        </script>';
        exit();
    }
    
    $pdo = conectarDB();
    $sql = "UPDATE cliente SET cliente_cedula=:cedula, cliente_nombre=:nombre, cliente_apellido=:apellido, cliente_num=:principal, cliente_num2=:secundario WHERE cliente_id=:id";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([
        ':id'         => $id,
        ':cedula'     => $cedula,
        ':nombre'     => $nombre,
        ':apellido'   => $apellido,
        ':principal'  => $principal,
        ':secundario' => $secundario
    ])) {
        echo '<script>
            alert("Cliente actualizado correctamente");
            window.location.href = "index.php?view=cliente_list";
        </script>';
        exit();
    } else {
        echo '<script>
            alert("No se pudo actualizar el cliente");
            window.location.href = "index.php?view=cliente_update&cliente_id_up=' . $id . '";
        </script>';
        exit();
    }
    
} else {
    echo '<script>window.location.href = "index.php?view=cliente_list";</script>';
    exit();
}
?>