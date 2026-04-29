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
    $check_cedula=$check_cedula->query("SELECT cliente_cedula FROM cliente WHERE cliente_cedula='$cedula'");
    if($check_cedula->rowCount()>0){
    echo '
    <script>
            alert("El numero de cedula ingresado ya existe en el sistema");
            window.location = "../index.php?vista=cliente_new"
        </script>
    ';
    exit();
    }
    $check_cedula=null;

    #GUARDAR DATOS
    $guardar_cliente=conexion();
    $guardar_cliente=$guardar_cliente->prepare("INSERT INTO cliente(cliente_cedula, cliente_nombre, cliente_apellido, cliente_num, cliente_num2) VALUES(:cedula, :nombre, :apellido, :principal, :secundario)");

    $marcadores=[
        ":cedula"=>$cedula, 
        ":nombre"=>$nombre, 
        ":apellido"=>$apellido, 
        ":principal"=>$principal, 
        ":secundario"=>$secundario
    ];
    $guardar_cliente->execute($marcadores);

    if($guardar_cliente->rowCount()==1){
        echo '
            <script>
                alert("El cliente se registro correctamente");
                window.location = "../index.php?vista=cliente_list"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se pudo registrar el cliente, intentelo nuevamente");
                window.location = "../index.php?vista=cliente_new"
            </script>
        ';
    }
    $guardar_cliente=null;