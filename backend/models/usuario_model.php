<?php
/**
 * Modelo de Usuario
 */

function conectarDB() {
    $host = 'localhost';
    $dbname = 'taller';
    $user = 'root';
    $password = '';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}

function validarUsuario($usuario, $password) {
    $pdo = conectarDB();
    
    $sql = "SELECT u.usuario_id, u.usuario_usuario, u.usuario_contrasena, u.rol_id 
        FROM usuario u 
        WHERE u.usuario_usuario = :usuario";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':usuario' => $usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['usuario_contrasena'])) {
        return $user;
    }
    
    return false;
}
?>