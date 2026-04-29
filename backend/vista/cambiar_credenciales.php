<div class="credentials-container">
    <h2>Cambiar Credenciales</h2>
    
    <div class="success-message" id="successMessage">
        ¡Credenciales actualizadas exitosamente!
    </div>
    
    <div class="error-message" id="errorMessage">
        Error al actualizar las credenciales. Por favor, inténtelo de nuevo.
    </div>
    
    <div class="current-info">
        <p><strong>Usuario actual:</strong> <?php echo $_SESSION['usuario']; ?></p>
        <p><strong>Rol:</strong> <?php echo ($_SESSION['rol'] == 1) ? 'Administrador' : 'Usuario'; ?></p>
    </div>
    
    <form action="../controllers/cambiar_credenciales.php" method="post" id="credentialsForm">
        <div class="field-group">
            <label for="nuevo_usuario">Nuevo Usuario:</label>
            <input type="text" id="nuevo_usuario" name="nuevo_usuario" required>
            <div class="error" id="usuarioError">El usuario ya existe o es inválido</div>
        </div>
        
        <div class="field-group">
            <label for="contrasena_actual">Contraseña Actual:</label>
            <input type="password" id="contrasena_actual" name="contrasena_actual" required>
            <div class="error" id="actualPasswordError">La contraseña actual es incorrecta</div>
        </div>
        
        <div class="field-group">
            <label for="nueva_contrasena">Nueva Contraseña:</label>
            <input type="password" id="nueva_contrasena" name="nueva_contrasena" required minlength="6">
            <div class="error" id="newPasswordError">La contraseña debe tener al menos 6 caracteres</div>
        </div>
        
        <div class="field-group">
            <label for="confirmar_contrasena">Confirmar Nueva Contraseña:</label>
            <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
            <div class="error" id="confirmPasswordError">Las contraseñas no coinciden</div>
        </div>
        
        <div class="btn-container">
            <button type="submit" class="btn-primary">Actualizar Credenciales</button>
            <button type="button" class="btn-secondary" onclick="window.location.href='index.php?vista=home'">Cancelar</button>
        </div>
    </form>
</div>

<script>
document.getElementById('credentialsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Reset error messages
    document.querySelectorAll('.error').forEach(error => error.style.display = 'none');
    document.getElementById('successMessage').style.display = 'none';
    document.getElementById('errorMessage').style.display = 'none';
    
    let isValid = true;
    
    // Validate new username
    const nuevoUsuario = document.getElementById('nuevo_usuario').value.trim();
    if (nuevoUsuario.length < 3) {
        document.getElementById('usuarioError').style.display = 'block';
        isValid = false;
    }
    
    // Validate password match
    const nuevaContrasena = document.getElementById('nueva_contrasena').value;
    const confirmarContrasena = document.getElementById('confirmar_contrasena').value;
    
    if (nuevaContrasena.length < 6) {
        document.getElementById('newPasswordError').style.display = 'block';
        isValid = false;
    }
    
    if (nuevaContrasena !== confirmarContrasena) {
        document.getElementById('confirmPasswordError').style.display = 'block';
        isValid = false;
    }
    
    if (isValid) {
        this.submit();
    }
});
</script>
