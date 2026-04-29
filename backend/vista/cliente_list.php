<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frontend/css/cliente_lista.css">
</head>
<body>
    <div class="table-container">
        <h2 class="table-title">CLIENTES CREADOS</h2> <!-- Título de la tabla -->
    <?php
    require_once __DIR__ . "/../controllers/main.php";

    //Eliminar cliente
    if(isset($_GET['cliente_id_del'])){
        require_once __DIR__ . "/../controllers/cliente_eliminar.php";
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
    $url="index.php?vista=cliente_list&page=";
    $registros=15;
    $busqueda="";

    require_once __DIR__ . "/../controllers/cliente_lista.php";
    ?>
    </div>
</body>