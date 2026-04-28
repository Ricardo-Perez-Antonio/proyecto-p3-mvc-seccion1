<?php require "./include/session_start.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Europits</title>
    <script src="https://kit.fontawesome.com/10e255b6d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/navegacion.css">
</head>
<body>
    <?php
        if(!isset($_GET['vista']) || $_GET['vista']==""){
            $_GET['vista']="login";

        }

        if(is_file("./vista/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){
            
            # Cerrar session #
            if ((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="") || (!isset($_SESSION['rol']) || $_SESSION['rol']=="")) {
                include "./vista/cerrar_session.php";
                exit();
            }

            include "./include/navegacion.php";
            include "./vista/".$_GET['vista'].".php";

        }else{
            if($_GET['vista']=="login"){
                include "./vista/login.php";
            }else{
                include "./vista/404.php";
            }
        }
        
    ?>
</body>
</html>