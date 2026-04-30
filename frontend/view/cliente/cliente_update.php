<link rel="stylesheet" href="../frontend/css/cliente_new.css">

<form action="index.php?view=cliente_editar" method="post" autocomplete="off">
    <h2>EDITAR CLIENTE</h2>
    
    <input type="hidden" name="cliente_id" value="<?php echo $id; ?>">

    <div class="field-group">
        <label for="nombre">Nombre:<span>*</span></label>
        <input type="text" name="name" id="nombre" value="<?php echo $nombre; ?>" required>
    </div>

    <div class="field-group">
        <label for="ape">Apellido:<span>*</span></label>
        <input type="text" name="ape" id="ape" value="<?php echo $apellido; ?>" required>
    </div>

    <div class="field-group">
        <label for="id">Cédula de Identidad:<span>*</span></label>
        <div class="id-input">
            <select name="cedula" id="id-select">
                <option value="V-" <?php echo ($tipo_cedula == 'V-') ? 'selected' : ''; ?>>V-</option>
                <option value="E-" <?php echo ($tipo_cedula == 'E-') ? 'selected' : ''; ?>>E-</option>
                <option value="R.I.F-" <?php echo ($tipo_cedula == 'R.I.F-') ? 'selected' : ''; ?>>R.I.F-</option>
            </select>
            <input type="text" placeholder="30.715.180" name="cedu" value="<?php echo $num_cedula; ?>" required>
        </div>
    </div>

    <div class="phone-group">
        <label>Numero de Telefono:</label>
        <div class="phone-field">
            <label for="habit">Principal:</label>
            <div class="phone-input">
                <select name="princi">
                    <option value="">-Seleccione-</option>
                    <option value="0412-" <?php echo ($codigo_principal == '0412') ? 'selected' : ''; ?>>0412-</option>
                    <option value="0414-" <?php echo ($codigo_principal == '0414') ? 'selected' : ''; ?>>0414-</option>
                    <option value="0424-" <?php echo ($codigo_principal == '0424') ? 'selected' : ''; ?>>0424-</option>
                    <option value="0416-" <?php echo ($codigo_principal == '0416') ? 'selected' : ''; ?>>0416-</option>
                    <option value="0426-" <?php echo ($codigo_principal == '0426') ? 'selected' : ''; ?>>0426-</option>
                </select>
                <input type="text" name="principal" value="<?php echo $num_principal; ?>">
            </div>
        </div>
        <div class="phone-field">
            <label for="celu">Secundario:</label>
            <div class="phone-input">
                <select name="secu">
                    <option value="">-Seleccione-</option>
                    <option value="0412-" <?php echo ($codigo_secundario == '0412') ? 'selected' : ''; ?>>0412-</option>
                    <option value="0414-" <?php echo ($codigo_secundario == '0414') ? 'selected' : ''; ?>>0414-</option>
                    <option value="0424-" <?php echo ($codigo_secundario == '0424') ? 'selected' : ''; ?>>0424-</option>
                    <option value="0416-" <?php echo ($codigo_secundario == '0416') ? 'selected' : ''; ?>>0416-</option>
                    <option value="0426-" <?php echo ($codigo_secundario == '0426') ? 'selected' : ''; ?>>0426-</option>
                </select>
                <input type="text" name="secundario" value="<?php echo $num_secundario; ?>">
            </div>
        </div>
    </div>

    <span>Los campos obligatorios están marcados con un asterisco rojo *</span>

    <div class="btns">
        <button type="submit" name="editar">Actualizar</button>
        <a href="index.php?view=cliente_list" class="btn-cancel">Cancelar</a>
    </div>
</form>