<script type="text/javascript">
  function validarPassword(password) {
    const decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8}$/;

    if(password.value.match(decimal)) {

        return true;

    } else {

        alert("La contraseña debe contener al menos una minúscula, mayúscula, número y un carácter especial. Y 8 carácteres como mínimo.")
        return false;
    }
}
</script>
<div class="body">
  <div class="container">
    <form method="POST" action="../controllers/usuario_guarda.php" name="registro" autocomplete="off">
      <h1>Crear usuario</h1>

          <label for="usuario">Usuario<span>*</span></label>
          <input required minlength="1" type="text" id="usuario" name="name" maxlength="30">

          <label for="password">Contraseña<span>*</span></label>
          <input required type="password" id="password" name="password">

          <label>Rol del sistema<span>*</span></label>
          <div class="radio-group">
            <label>Administrador<input required type="radio" name="tipo" value="1"> </label>
            <label>Usuario<input class="input-2" required type="radio" name="tipo" value="2"></label><br><br>
          </div>
          <p>Los campos obligatorios están marcados con un asterisco rojo *</p>

          <div class="btns">
            <button type="submit" name="crear" onclick="return validarPassword(password)">Crear</button>
            <button type="reset">Limpiar</button>
          </div>   
    </form>
  </div>
</div>
