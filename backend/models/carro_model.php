<?php
/**
 * Modelo de Carros
 */

function listarCarrosPorCliente($cliente_id, $inicio, $registros) {
    $pdo = conectarDB();
    $sql = "SELECT * FROM carros 
            WHERE carro_cliente = :cliente_id 
            ORDER BY carro_año ASC 
            LIMIT :inicio, :registros";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cliente_id', $cliente_id, PDO::PARAM_INT);
    $stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
    $stmt->bindValue(':registros', $registros, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function contarCarrosPorCliente($cliente_id) {
    $pdo = conectarDB();
    $sql = "SELECT COUNT(carro_id) FROM carros WHERE carro_cliente = :cliente_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cliente_id', $cliente_id, PDO::PARAM_INT);
    $stmt->execute();
    return (int) $stmt->fetchColumn();
}

function obtenerCarroPorId($id) {
    $pdo = conectarDB();
    $sql = "SELECT * FROM carros WHERE carro_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function guardarCarro($vehiculo, $matricula, $ano, $color, $km, $bateria, $cliente_id) {
    $pdo = conectarDB();
    $sql = "INSERT INTO carros (carro_vehiculo, carro_matricula, carro_año, carro_color, carro_kilometraje, carro_serial_bateria, carro_cliente) 
            VALUES (:vehiculo, :matricula, :ano, :color, :km, :bateria, :cliente_id)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':vehiculo'   => $vehiculo,
        ':matricula'  => $matricula,
        ':ano'        => $ano,
        ':color'      => $color,
        ':km'         => $km,
        ':bateria'    => $bateria,
        ':cliente_id' => $cliente_id
    ]);
}

function actualizarCarro($id, $vehiculo, $matricula, $ano, $color, $km, $bateria) {
    $pdo = conectarDB();
    $sql = "UPDATE carros SET carro_vehiculo=:vehiculo, carro_matricula=:matricula, carro_año=:ano, carro_color=:color, carro_kilometraje=:km, carro_serial_bateria=:bateria WHERE carro_id=:id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':vehiculo'  => $vehiculo,
        ':matricula' => $matricula,
        ':ano'       => $ano,
        ':color'     => $color,
        ':km'        => $km,
        ':bateria'   => $bateria,
        ':id'        => $id
    ]);
}

function eliminarCarro($id) {
    $pdo = conectarDB();
    $sql = "DELETE FROM carros WHERE carro_id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}
?>