<?php

    require_once "../include/session_start.php";
    require_once "main.php";

	$id=limpiar_cadena($_POST['cliente_id']);

    //Verificar el cliente
	$check_cliente=conexion();
	$check_cliente=$check_cliente->query("SELECT * FROM cliente WHERE cliente_id='$id'");
	if ($check_cliente->rowCount()<=0) {
		echo '
            <script>
                alert("El cliente no existe en el sistema");
                window.location = "index.php?vista=home"
            </script>
        ';
        exit();
	}else{
		$datos=$check_cliente->fetch();
	}
	$check_cliente=null;

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

    #GUARDAR DATOS
    $guardar_carro=conexion();
    $guardar_carro=$guardar_carro->prepare("INSERT INTO carros(carro_vehiculo, carro_matricula, carro_año, carro_color, carro_kilometraje, carro_serial_bateria, carro_cliente) 
                                            VALUES(:vehiculo, :matricula, :ano, :color, :km, :bateria, :id)");

    $marcadores=[
        ":vehiculo"=>$vehiculo,
        ":matricula"=>$matricula,
        ":ano"=>$ano,
        ":color"=>$color,
        ":km"=>$km,
        ":bateria"=>$bateria, 
        ":id"=>$id
    ];
    $guardar_carro->execute($marcadores);

    if($guardar_carro->rowCount()==1){
        echo '
            <script>
                alert("El carro se registro correctamente");
                window.location = "../index.php?vista=cliente_profile&cliente_id_up='.$id.'"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se pudo registrar el carro, intentelo nuevamente");
                window.location = "../index.php?vista=cliente_profile&cliente_id_up='.$id.'"
            </script>
        ';
    }
    $guardar_carro=null;
