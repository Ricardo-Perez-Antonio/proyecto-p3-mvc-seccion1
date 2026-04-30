<?php
/**
 * Modelo de Cliente
 */

function listarClientes($inicio, $registros, $busqueda = '') {
    $pdo = conectarDB();
    
    if ($busqueda != '') {
        $sql = "SELECT * FROM cliente 
                WHERE cliente_cedula LIKE :busqueda 
                OR cliente_nombre LIKE :busqueda 
                OR cliente_apellido LIKE :busqueda 
                ORDER BY cliente_cedula ASC 
                LIMIT :inicio, :registros";
    } else {
        $sql = "SELECT * FROM cliente 
                ORDER BY cliente_cedula ASC 
                LIMIT :inicio, :registros";
    }
    
    $stmt = $pdo->prepare($sql);
    
    if ($busqueda != '') {
        $stmt->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
    }
    $stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
    $stmt->bindValue(':registros', $registros, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function contarClientes($busqueda = '') {
    $pdo = conectarDB();
    
    if ($busqueda != '') {
        $sql = "SELECT COUNT(cliente_id) FROM cliente 
                WHERE cliente_cedula LIKE :busqueda 
                OR cliente_nombre LIKE :busqueda 
                OR cliente_apellido LIKE :busqueda";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
    } else {
        $sql = "SELECT COUNT(cliente_id) FROM cliente";
        $stmt = $pdo->prepare($sql);
    }
    
    $stmt->execute();
    return (int) $stmt->fetchColumn();
}

function obtenerClientePorId($id) {
    $pdo = conectarDB();
    $sql = "SELECT * FROM cliente WHERE cliente_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function guardarCliente($cedula, $nombre, $apellido, $principal, $secundario) {
    $pdo = conectarDB();
    $sql = "INSERT INTO cliente (cliente_cedula, cliente_nombre, cliente_apellido, cliente_num, cliente_num2) 
            VALUES (:cedula, :nombre, :apellido, :principal, :secundario)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':cedula'     => $cedula,
        ':nombre'     => $nombre,
        ':apellido'   => $apellido,
        ':principal'  => $principal,
        ':secundario' => $secundario
    ]);
}

function existeCedula($cedula) {
    $pdo = conectarDB();
    $sql = "SELECT COUNT(cliente_id) FROM cliente WHERE cliente_cedula = :cedula";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':cedula' => $cedula]);
    return $stmt->fetchColumn() > 0;
}

function eliminarCliente($id) {
    $pdo = conectarDB();
    $sql = "DELETE FROM cliente WHERE cliente_id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([':id' => $id]) && $stmt->rowCount() > 0;
}
?>