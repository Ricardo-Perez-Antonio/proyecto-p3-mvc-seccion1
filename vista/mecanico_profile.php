<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cliente_profile.css">
</head> 
<?php
	require_once "./php/main.php";

	$id = (isset($_GET['mecanico_id_up'])) ? $_GET['mecanico_id_up'] : 0;
	$id=limpiar_cadena($id);

	$check_mecanico=conexion();
	$check_mecanico=$check_mecanico->query("SELECT * FROM mecanicos WHERE mecanico_id='$id'");
	if($check_mecanico->rowCount()>0){
		$datos=$check_mecanico->fetch();

        $nombre=$datos['mecanico_nombre'];
        $apellido=$datos['mecanico_apellido'];
        $cedula=$datos['mecanico_cedula'];
        $principal=$datos['mecanico_num'];
        $secundario=$datos['mecanico_num2'];
?>
<body>
<div class="profile-container">
    <h1 class="profile-title">PERFIL DE MECANICO</h1>
        <div class="profile-header">
            <div class="profile-image">
                <img src="./img/cliente.png" alt="Imagen de perfil">
            </div>
            <div class="profile-info">
                <div class="info-line">
                    <span class="info-item">Nombre: <?php echo $nombre;?></span>
                    <span class="info-item">Apellido: <?php echo $apellido;?></span>
                    <span class="info-item">Cédula/R.I.F: <?php echo $cedula;?></span>
                </div>
                <div class="info-line">
                    <span class="info-item">Teléfono 1: <?php echo $principal;?></span>
                    <span class="info-item">Teléfono 2: <?php echo $secundario;?></span>
                </div>
            </div>
        </div>
        <div class="car-table">
        </div>
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
	$check_mecanico=null;
?>
