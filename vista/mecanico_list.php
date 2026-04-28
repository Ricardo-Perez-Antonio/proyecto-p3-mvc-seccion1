<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mecanico_lista.css">
</head>
<body>
    <div class="table-container">
        <h2 class="table-title">CLIENTES MECANICOS</h2> <!-- Título de la tabla -->
    <?php
    require_once "./php/main.php";

    //Eliminar cliente
    if(isset($_GET['mecanico_id_del'])){
        require_once "./php/mecanico_eliminar.php";
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
    $url="index.php?vista=mecanico_list&page=";
    $registros=15;
    $busqueda="";

    require_once './php/mecanico_lista.php';
    ?>
    </div>
</body>