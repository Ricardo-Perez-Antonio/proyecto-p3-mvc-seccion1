<?php

# Verificar que el usuario esté logueado
if (!isset($_SESSION['id']) || $_SESSION['id'] == "") {
    echo '
    <script>
        alert("Debe iniciar sesión para acceder a esta función");
        window.location = "../index.php?vista=login"
    </script>
    ';
    exit();
}

# Almacenar datos
$nuevo_usuario = limpiar_cadena($_POST['nuevo_usuario']);
$contrasena_actual = limpiar_cadena($_POST['contrasena_actual']);
$nueva_contrasena = limpiar_cadena($_POST['nueva_contrasena']);
$confirmar_contrasena = limpiar_cadena($_POST['confirmar_contrasena']);

# Verificar datos obligatorios
if ($nuevo_usuario == "" || $contrasena_actual == "" || $nueva_contrasena == "" || $confirmar_contrasena == "") {
    echo '
    <script>
        alert("No has llenado todos los campos que son obligatorios");
        window.location = "../index.php?vista=cambiar_credenciales"
    </script>
    ';
    exit();
}

# Validar que las nuevas contraseñas coincidan
if ($nueva_contrasena !== $confirmar_contrasena) {
    echo '
    <script>
        alert("Las nuevas contraseñas no coinciden");
        window.location = "../index.php?vista=cambiar_credenciales"
    </script>
    ';
    exit();
}

# Validar longitud de la nueva contraseña
if (strlen($nueva_contrasena) < 6) {
    echo '
    <script>
        alert("La nueva contraseña debe tener al menos 6 caracteres");
        window.location = "../index.php?vista=cambiar_credenciales"
    </script>
    ';
    exit();
}

# Validar longitud del nuevo usuario
if (strlen($nuevo_usuario) < 3) {
    echo '
    <script>
        alert("El nuevo usuario debe tener al menos 3 caracteres");
        window.location = "../index.php?vista=cambiar_credenciales"
    </script>
    ';
    exit();
}

# Verificar la contraseña actual del usuario
$check_usuario = conexion();
$check_usuario = $check_usuario->query("SELECT * FROM usuario WHERE usuario_id = '" . $_SESSION['id'] . "'");

if ($check_usuario->rowCount() == 1) {
    $datos_usuario = $check_usuario->fetch();
    
    # Verificar que la contraseña actual sea correcta
    if (password_verify($contrasena_actual, $datos_usuario['usuario_contrasena'])) {
        
        # Verificar si el nuevo usuario ya existe (si es diferente al actual)
        if ($nuevo_usuario !== $datos_usuario['usuario_usuario']) {
            $check_nuevo_usuario = conexion();
            $check_nuevo_usuario = $check_nuevo_usuario->query("SELECT * FROM usuario WHERE usuario_usuario = '$nuevo_usuario' AND usuario_id != '" . $_SESSION['id'] . "'");
            
            if ($check_nuevo_usuario->rowCount() > 0) {
                echo '
                <script>
                    alert("El nombre de usuario ya está en uso por otra persona");
                    window.location = "../index.php?vista=cambiar_credenciales"
                </script>
                ';
                exit();
            }
        }
        
        # Actualizar credenciales
        $nueva_contrasena_hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
        
        $actualizar = conexion();
        $actualizar = $actualizar->prepare("UPDATE usuario SET usuario_usuario = :usuario, usuario_contrasena = :contrasena WHERE usuario_id = :id");
        
        $marcadores = [
            ":usuario" => $nuevo_usuario,
            ":contrasena" => $nueva_contrasena_hash,
            ":id" => $_SESSION['id']
        ];
        
        if ($actualizar->execute($marcadores)) {
            # Actualizar la sesión con el nuevo nombre de usuario
            $_SESSION['usuario'] = $nuevo_usuario;
            
            echo '
            <script>
                alert("¡Credenciales actualizadas exitosamente!");
                window.location = "../index.php?vista=home"
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Error al actualizar las credenciales. Por favor, inténtelo de nuevo.");
                window.location = "../index.php?vista=cambiar_credenciales"
            </script>
            ';
        }
        
        $actualizar = null;
        
    } else {
        echo '
        <script>
            alert("La contraseña actual es incorrecta");
            window.location = "../index.php?vista=cambiar_credenciales"
        </script>
        ';
    }
} else {
    echo '
    <script>
        alert("Error: Usuario no encontrado en el sistema");
        window.location = "../index.php?vista=login"
    </script>
    ';
}

$check_usuario = null;
?>
