<?php
	require_once 	require_once "../controllers/main.php";SERVER['DOCUMENT_ROOT'] . '/Taller/proyecto-p3-mvc/backend/controllers/main.php";

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
        $km=$datos['carro_km'];
        $bateria=$datos['carro_serial_bateria'];
?>
<div class="container">
        <h1>Perfil del Vehículo</h1>
        <div class="vehicle-info">
            <h2>Información del Vehículo</h2>
            <p><strong>Número de Vehículo:</strong> <?php echo $vehiculo; ?></p>
            <p><strong>Matrícula:</strong> <?php echo $matricula; ?> </p>
            <p><strong>Año:</strong> <?php echo $año; ?></p>
            <p><strong>Color:</strong> <?php echo $color; ?> </p>
            <p><strong>Kilometraje:</strong> <?php echo $km; ?> </p>
            <p><strong>Serial de Batería:</strong> <?php echo $bateria; ?> </p>
        </div>
        <div class="service-history">
            <div class="button-container">
                <button class="add-service-btn">Agregar Servicio</button>
            </div>
            <h2>Historial de Servicios</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Servicio</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01/09/2024</td>
                        <td>Cambio de Aceite</td>
                        <td>Cambio de aceite de motor y filtro</td>
                    </tr>
                    <tr>
                        <td>15/08/2024</td>
                        <td>Revisión de Frenos</td>
                        <td>Reemplazo de pastillas de freno</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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
