<?php
// Script para crear el usuario administrador juan con contraseña 1234

// Incluir la función de conexión
require_once "./backend/controllers/main.php";

try {
    // Conectar a la base de datos
    $pdo = conexion();
    
    // Verificar si el rol de administrador existe
    $check_rol = $pdo->query("SELECT rol_id FROM rol WHERE rol_nombre = 'administrador'");
    if ($check_rol->rowCount() == 0) {
        // Crear el rol de administrador
        $pdo->exec("INSERT INTO rol (rol_nombre) VALUES ('administrador')");
        $rol_id = 1;
        echo "Rol de administrador creado.<br>";
    } else {
        $rol_id = $check_rol->fetch()['rol_id'];
        echo "Rol de administrador ya existe.<br>";
    }
    
    // Hashear la contraseña 1234
    $contrasena = "1234";
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
    
    // Insertar o actualizar el usuario juan
    $sql = "INSERT INTO usuario (usuario_usuario, usuario_contrasena, rol_id) 
            VALUES (:usuario, :contrasena, :rol_id)
            ON DUPLICATE KEY UPDATE 
            usuario_contrasena = :contrasena, rol_id = :rol_id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':usuario' => 'juan',
        ':contrasena' => $contrasena_hash,
        ':rol_id' => $rol_id
    ]);
    
    echo "¡Usuario administrador 'juan' con contraseña '1234' creado exitosamente!<br>";
    echo "<a href='index.php'>Ir al login</a>";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
