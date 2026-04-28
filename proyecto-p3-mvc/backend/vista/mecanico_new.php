<form action="../controllers/mecanico_guardar.php" method="post" autocomplete="off">
        <h2>CREAR MECANICO</h2>

        <div class="field-group">
            <label for="nombre">Nombre:<span>*</span></label>
            <input type="text" name="name" id="nombre" required>
        </div>

        <div class="field-group">
            <label for="ape">Apellido:<span>*</span></label>
            <input type="text" name="ape" id="ape" required>
        </div>

        <div class="field-group">
            <label for="id">Cédula de Identidad:<span>*</span></label>
            <div class="id-input">
                <select name="cedula" id="id-select">
                    <option value="V-">V-</option>
                    <option value="E-">E-</option>
                </select>
                <input type="text" placeholder="30.715.180" name="cedu" id="id-input" pattern="[0-9.]{1,10}" maxlength="10" required>
            </div>
        </div>

        <div class="phone-group">
            <label for="">Numero de Telefono:</label>
            <div class="phone-field">
                <label for="habit">Principal:</label>
                <div class="phone-input">
                    <select name="princi" id="codihabit">
                        <option>-Seleccione-</option>
                        <option value="0412-">0412-</option>
                        <option value="0414-">0414-</option>
                        <option value="0424-">0424-</option>
                        <option value="0416-">0416-</option>
                        <option value="0426-">0426-</option>
                    </select>
                    <input type="text" name="principal" id="habit" pattern="[0-9.]{1,7}" maxlength="7">
                </div>
            </div>
            <div class="phone-field">
                <label for="celu">Secundario:</label>
                <div class="phone-input">
                    <select name="secu" id="codicelu">
                        <option value="">-Seleccione-</option>
                        <option value="0412-">0412-</option>
                        <option value="0414-">0414-</option>
                        <option value="0424-">0424-</option>
                        <option value="0416-">0416-</option>
                        <option value="0426-">0426-</option>
                    </select>
                    <input type="text" name="secundario" id="celu" pattern="[0-9.]{1,7}" maxlength="7">
                </div>
            </div>
        </div>

        <span>Los campos obligatorios están marcados con un asterisco rojo *</span>

        <div class="btns">
            <button type="submit" name="crear">Crear</button>
            <button type="reset">Limpiar</button>
        </div>
    </form>
