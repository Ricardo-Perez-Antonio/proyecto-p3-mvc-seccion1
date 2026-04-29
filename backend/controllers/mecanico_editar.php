<?php
	require_once "../include/session_start.php";
	require_once "main.php";

	$id=limpiar_cadena($_POST['mecanico_id']);

	// Verificar el mecanico
	$check_mecanico=conexion();
	$check_mecanico=$check_mecanico->query("SELECT * FROM mecanicos WHERE mecanico_id='$id'");
	if ($check_mecanico->rowCount()<=0) {
		echo '
            <script>
                alert("El mecanico no existe en el sistema");
                window.location = "index.php?vista=home"
            </script> 
        ';
        exit();
	}else{
		$datos=$check_mecanico->fetch();
	}
	$check_mecanico=null;

    #Almacenando datos
    $nombre=limpiar_cadena($_POST['name']);
    $apellido=limpiar_cadena($_POST['ape']);
    $cedula=limpiar_cadena($_POST['n']."".$_POST['cedu']);
    $principal=limpiar_cadena($_POST['codiprin']."".$_POST['princi']);
    $secundario=limpiar_cadena($_POST['codisecu']."".$_POST['secu']);
 
    #Verificar datos obligatorios
    if($nombre=="" || $apellido=="" || $cedula==""){
        echo '
        <script>
            alert("No has llenado todo los campos que son obligatorios");
            window.location = "../index.php?vista=cliente_new"
        </script>
        ';
        exit();
    }

    #PASANDO LOS DATOS A MAYUSCULA
    $nombre=strtoupper($nombre);
    $apellido=strtoupper($apellido);

    //Editar datos
    $editar_mecanico=conexion();
    $editar_mecanico=$editar_mecanico->prepare("UPDATE mecanicos SET mecanico_cedula=:cedula, mecanico_nombre=:nombre, mecanico_apellido=:apellido, mecanico_num=:principal, mecanico_num2=:secundario WHERE mecanico_id=:id");

    $marcadores=[
    	":id"=>$id,
        ":cedula"=>$cedula,
        ":nombre"=>$nombre,
        ":apellido"=>$apellido,
        ":principal"=>$principal,
        ":secundario"=>$secundario
	];

    if ($editar_mecanico->execute($marcadores)){
       	echo '
            <script>
               	alert("El mecanico fue editado correctamente");
                window.location = "../index.php?vista=mecanico_list"
            </script>
        ';
    }else{
       	echo '
            <script>
                alert("¡Ocurrio un error! No se pudo editar el mecanico");
                window.location = "../index.php?vista=mecanico_list"
            </script>
        ';
    }
    $editar_mecanico=null;
