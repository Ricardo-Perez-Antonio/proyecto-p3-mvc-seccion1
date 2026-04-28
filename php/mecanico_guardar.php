<?php

    require_once "main.php";

    #Almacenando datos
    $nombre=limpiar_cadena($_POST['name']);
    $apellido=limpiar_cadena($_POST['ape']);
    $cedula=limpiar_cadena($_POST['cedula']."".$_POST['cedu']);
    $principal=limpiar_cadena($_POST['princi']."".$_POST['principal']);
    $secundario=limpiar_cadena($_POST['secu']."".$_POST['secundario']);

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

    /*Verificando numero de cedula*/
    $check_cedula=conexion();
    $check_cedula=$check_cedula->query("SELECT mecanico_cedula FROM mecanicos WHERE mecanico_cedula='$cedula'");
    if($check_cedula->rowCount()>0){
    echo '
    <script>
            alert("El numero de cedula ingresado ya existe en el sistema");
            window.location = "../index.php?vista=mecanico_new"
        </script>
    ';
    exit();
    }
    $check_cedula=null;

    #GUARDAR DATOS
    $guardar_mecanico=conexion();
    $guardar_mecanico=$guardar_mecanico->prepare("INSERT INTO mecanicos(mecanico_cedula, mecanico_nombre, mecanico_apellido, mecanico_num, mecanico_num2) 
                                                    VALUES(:cedula, :nombre, :apellido, :principal, :secundario)");

    $marcadores=[
        ":cedula"=>$cedula, 
        ":nombre"=>$nombre, 
        ":apellido"=>$apellido, 
        ":principal"=>$principal, 
        ":secundario"=>$secundario
    ];
    $guardar_mecanico->execute($marcadores);

    if($guardar_mecanico->rowCount()==1){
        echo '
            <script>
                alert("El mecanico se registro correctamente");
                window.location = "../index.php?vista=mecanico_list"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se pudo registrar el mecanico, intentelo nuevamente");
                window.location = "../index.php?vista=mecanico_new"
            </script>
        ';
    }
    $guardar_mecanico=null;