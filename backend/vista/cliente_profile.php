<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frontend/css/cliente_profile.css">
</head> 
<?php
	require_once __DIR__ . "/../controllers/main.php";

	$id = (isset($_GET['cliente_id_up'])) ? $_GET['cliente_id_up'] : 0;
	$id=limpiar_cadena($id);

	$check_cliente=conexion();
	$check_cliente=$check_cliente->query("SELECT * FROM cliente WHERE cliente_id='$id'");
	if($check_cliente->rowCount()>0){
		$datos=$check_cliente->fetch();

        $nombre=$datos['cliente_nombre'];
        $apellido=$datos['cliente_apellido'];
        $cedula=$datos['cliente_cedula'];
        $principal=$datos['cliente_num'];
        $secundario=$datos['cliente_num2'];
?>
<div class="profile-container">
    <h1 class="profile-title">PERFIL DE CLIENTE</h1>
        <div class="profile-header">
            <div class="profile-image">
                <img src="frontend/img/cliente.png" alt="Imagen de perfil">
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
            <a href="../../index.php?vista=carro_new&cliente_id_up=<?php echo $id;?>" class="add-car-button">Agregar Carro</a>
            <h2>CARROS REGISTRADOS</h2>
            <?php
                require_once __DIR__ . "/../controllers/main.php";

                //Eliminar cliente
                if(isset($_GET['carro_id_del'])){
                    require_once __DIR__ . "/../controllers/carro_eliminar.php";
                }
                
                if (!isset($_GET['page'])) {
                    $pagina=1;
                }else{
                    $pagina=(int) $_GET['page'];
                    if($pagina<=1){
                        $pagina=1;
                    }

                }

                $pagina=limpiar_cadena($pagina);
                $url="index.php?vista=carro_list&cliente_id_up=".$id."&page=";
                $registros=15;
                $busqueda="";

                require_once __DIR__ . "/../controllers/carro_lista.php";
            ?>
        </div>
    </div>
<?php
	}else{
		echo '
            <script>
                alert("No podemos obtener la informacion solicitada");
                window.location = "../../index.php?vista=cliente_list"
            </script>
            ';
	}
	$check_cliente=null;
?>
