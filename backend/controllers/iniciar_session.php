<?php
/**
 * Controlador de Login
 */

require_once __DIR__ . '/../models/usuario_model.php';

function procesarLogin() {
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $usuario = trim($_POST['usuario'] ?? '');
        $password = trim($_POST['password'] ?? '');
        
        // Validar con base de datos
        $user = validarUsuario($usuario, $password);
        
        if ($user) {
            
            $_SESSION['id'] = $user['usuario_id'];
            $_SESSION['usuario'] = $user['usuario_usuario'];
            $_SESSION['rol'] = $user['rol_id'];
            
            header('Location: index.php?view=home');
            exit();
            
        } else {
            
            $error = "Usuario o contraseña incorrectos";
            $view = 'login';
            $es_publica = true;
            
            include RUTA_VIEWS . 'plantilla.php';
            exit();
        }
        
    } else {
        header('Location: index.php?view=login');
        exit();
    }
}
?>