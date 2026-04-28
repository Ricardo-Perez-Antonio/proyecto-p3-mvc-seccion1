<?php
	require_once "../include/session_start.php";
	require_once "main.php";

	$id=limpiar_cadena($_POST['carro_id']);

    // Verificar el cliente
	$check_carro=conexion();
	$check_carro=$check_carro->query("SELECT * FROM carros WHERE carro_id='$id'");
	if ($check_carro->rowCount()<=0) {
		echo '
            <script>
                alert("El carro no existe en el sistema");
                window.location = "index.php?vista=home"
            </script>
        ';
        exit();
	}else{
		$datos=$check_carro->fetch();
	}
	$check_carro=null;

    #Almacenando datos
    $vehiculo=limpiar_cadena($_POST['vehiculo']);
    $matricula=limpiar_cadena($_POST['matricula']);
    $ano=limpiar_cadena($_POST['año']);
    $color=limpiar_cadena($_POST['color']);
    $km=limpiar_cadena($_POST['km']);
    $bateria=limpiar_cadena($_POST['bateria']);

    #Verificar datos obligatorios
    if($vehiculo=="" || $matricula=="" || $color=="" || $ano=="" || $bateria==""){
        echo '
        <script>
            alert("No has llenado todo los campos que son obligatorios");
            window.location = "../index.php?vista=cliente_list"
        </script>
        ';
        exit();
    }

    #PASANDO LOS DATOS A MAYUSCULA
    $vehiculo=strtoupper($vehiculo);
    $matricula=strtoupper($matricula);
    $color=strtoupper($color);
    $km=strtoupper($km);
    $bateria=strtoupper($bateria);

    //Editar datos
    $editar_carro=conexion();
    $editar_carro=$editar_carro->prepare("UPDATE carros SET carro_vehiculo=:vehiculo, carro_matricula=:matricula, carro_año=:ano, carro_color=:color, carro_kilometraje=:km, carro_serial_bateria=:bateria WHERE carro_id=:id");

    $marcadores=[
        ":vehiculo"=>$vehiculo,
        ":matricula"=>$matricula,
        ":ano"=>$ano,
        ":color"=>$color,
        ":km"=>$km,
        ":bateria"=>$bateria, 
        ":id"=>$id
    ];
    $editar_carro->execute($marcadores);

    if($editar_carro->rowCount()==1){
        echo '
            <script>
                alert("El carro se edito correctamente");
                window.location = "../index.php?vista=cliente_profile&cliente_id_up='.$id.'"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se pudo edito el carro, intentelo nuevamente");
                window.location = "../index.php?vista=cliente_profile&cliente_id_up='.$id.'"
            </script>
        ';
    }
    $editar_carro=null;
