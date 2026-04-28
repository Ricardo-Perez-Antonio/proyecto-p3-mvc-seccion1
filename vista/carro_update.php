<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/carro_new.css">
</head>
<?php
	require_once "./php/main.php";

	$id = (isset($_GET['carro_id_up'])) ? $_GET['carro_id_up'] : 0;
	$id=limpiar_cadena($id);

	$check_carro=conexion();
	$check_carro=$check_carro->query("SELECT * FROM carros WHERE carro_id='$id'");
	if($check_carro->rowCount()>0){
		$datos=$check_carro->fetch();

        $vehiculo=$datos['carro_vehiculo'];
        $matricula=$datos['carro_matricula'];
        $año=$datos['carro_año'];
        $color=$datos['carro_color'];
        $km=$datos['carro_kilometraje'];
        $bateria=$datos['carro_serial_bateria'];
?>
<body>
<div class="form-container">
    <h1>Editar Vehículo</h1>
    <form action="./php/carro_editar.php" method="post">
        <input type="hidden" name="carro_id" value="<?php echo $datos['carro_id'];?>" required>

        <div class="form-group">
            <label for="vehicle-number">Número de Vehículo:<span>*</span></label>
            <input type="text" id="vehicle-number" name="vehiculo" value="<?php echo $vehiculo;?>" required>
        </div>
        <div class="form-group">
            <label for="license-plate">Matrícula:<span>*</span></label>
            <input type="text" id="license-plate" name="matricula" value="<?php echo $matricula;?>" required>
        </div>
        <div class="form-group">
            <label for="year">Año:<span>*</span></label>
            <input type="number" id="year" name="año" min="1900" max="2099" value="<?php echo $año;?>" required>
        </div>
        <div class="form-group">
            <label for="color">Color:<span>*</span></label>
            <input type="text" id="color" name="color" value="<?php echo $color;?>" required>
        </div>
        <div class="form-group">
            <label for="mileage">Kilometraje:<span>*</span></label>
            <input type="number" id="mileage" name="km" step="0.1" value="<?php echo $km;?>" required>
        </div>
        <div class="form-group">
            <label for="battery-serial">Serial de Batería:<span>*</span></label>
            <input type="text" id="battery-serial" name="bateria" value="<?php echo $bateria;?>" required>
        </div>
        <span>Los campos obligatorios están marcados con un asterisco rojo *</span>
        <div class="form-group">
            <button type="submit" class="submit-button">Editar</button>
        </div>
    </form>
</div>
</body>
<?php
	}else{
		echo '
            <script>
                alert("No podemos obtener la informacion solicitada");
                window.location = "index.php?vista=cliente_list"
            </script>
            ';
	}
	$check_carro=null;
?>