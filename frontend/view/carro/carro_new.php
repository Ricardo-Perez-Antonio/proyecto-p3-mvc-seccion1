<link rel="stylesheet" href="../frontend/css/carro_new.css">

<div class="form-container">
    <h1>Registro de Vehículo</h1>
    <form action="index.php?view=carro_guardar" method="post">
        <input type="hidden" name="cliente_id" value="<?php echo $cliente_id; ?>" required>

        <div class="form-group">
            <label for="vehicle-number">Número de Vehículo:<span>*</span></label>
            <input type="text" id="vehicle-number" name="vehiculo" required>
        </div>
        <div class="form-group">
            <label for="license-plate">Matrícula:<span>*</span></label>
            <input type="text" id="license-plate" name="matricula" required>
        </div>
        <div class="form-group">
            <label for="year">Año:<span>*</span></label>
            <input type="number" id="year" name="año" min="1900" max="2099" required>
        </div>
        <div class="form-group">
            <label for="color">Color:<span>*</span></label>
            <input type="text" id="color" name="color" required>
        </div>
        <div class="form-group">
            <label for="mileage">Kilometraje:<span>*</span></label>
            <input type="number" id="mileage" name="km" step="0.1" required>
        </div>
        <div class="form-group">
            <label for="battery-serial">Serial de Batería:<span>*</span></label>
            <input type="text" id="battery-serial" name="bateria" required>
        </div>
        <span>Los campos obligatorios están marcados con un asterisco rojo *</span>
        <div class="form-group">
            <button type="submit" class="submit-button">Registrar</button>
            <button type="reset" class="reset-button">Cancelar</button>
        </div>
    </form>
</div>