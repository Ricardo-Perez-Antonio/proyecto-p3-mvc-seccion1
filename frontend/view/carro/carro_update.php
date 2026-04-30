<link rel="stylesheet" href="../frontend/css/carro_new.css">

<div class="form-container">
    <h1>Editar Vehículo</h1>
    <form action="index.php?view=carro_editar" method="post">
        <input type="hidden" name="carro_id" value="<?php echo $id; ?>" required>

        <div class="form-group">
            <label for="vehicle-number">Número de Vehículo:<span>*</span></label>
            <input type="text" id="vehicle-number" name="vehiculo" value="<?php echo $vehiculo; ?>" required>
        </div>
        <div class="form-group">
            <label for="license-plate">Matrícula:<span>*</span></label>
            <input type="text" id="license-plate" name="matricula" value="<?php echo $matricula; ?>" required>
        </div>
        <div class="form-group">
            <label for="year">Año:<span>*</span></label>
            <input type="number" id="year" name="año" min="1900" max="2099" value="<?php echo $ano; ?>" required>
        </div>
        <div class="form-group">
            <label for="color">Color:<span>*</span></label>
            <input type="text" id="color" name="color" value="<?php echo $color; ?>" required>
        </div>
        <div class="form-group">
            <label for="mileage">Kilometraje:<span>*</span></label>
            <input type="number" id="mileage" name="km" step="0.1" value="<?php echo $km; ?>" required>
        </div>
        <div class="form-group">
            <label for="battery-serial">Serial de Batería:<span>*</span></label>
            <input type="text" id="battery-serial" name="bateria" value="<?php echo $bateria; ?>" required>
        </div>
        <span>Los campos obligatorios están marcados con un asterisco rojo *</span>
        <div class="form-group">
            <button type="submit" class="submit-button">Editar</button>
        </div>
    </form>
</div>