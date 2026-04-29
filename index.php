<?php 
require "./backend/include/session_start.php"; 
require "./backend/controllers/main.php"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Europits</title>
    <script src="https://kit.fontawesome.com/10e255b6d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./frontend/css/navegacion.css">
    <?php
        // Set default view if not set
        if(!isset($_GET['vista']) || $_GET['vista']==""){
            $_GET['vista']="login";
        }
        
        // Dynamic CSS loading based on view
        $vista = $_GET['vista'];
        $css_file = "./frontend/css/".$vista.".css";
        if(file_exists($css_file)){
            echo '<link rel="stylesheet" href="'.$css_file.'">';
        }
    ?>
</head>
<body>
    <?php
        if(is_file("./backend/vista/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){
            
            # Cerrar session #
            if ((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="") || (!isset($_SESSION['rol']) || $_SESSION['rol']=="")) {
                include "./backend/vista/cerrar_session.php";
                exit();
            }

            include "./backend/include/navegacion.php";
            include "./backend/vista/".$_GET['vista'].".php";

        }else{
            if($_GET['vista']=="login"){
                include "./backend/vista/login.php";
            }else{
                include "./backend/vista/404.php";
            }
        }
        
    ?>
</body>
</html>