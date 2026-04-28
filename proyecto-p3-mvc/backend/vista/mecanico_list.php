    <div class="table-container">
        <h2 class="table-title">CLIENTES MECANICOS</h2> <!-- Título de la tabla -->
    <?php
    require_once     require_once "../controllers/main.php";SERVER['DOCUMENT_ROOT'] . '/Taller/proyecto-p3-mvc/backend/controllers/main.php";

    //Eliminar cliente
    if(isset($_GET['mecanico_id_del'])){
        require_once         require_once "../controllers/mecanico_eliminar.php";SERVER['DOCUMENT_ROOT'] . '/Taller/proyecto-p3-mvc/backend/controllers/mecanico_eliminar.php";
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

    require_once '../controllers/mecanico_lista.php';
    ?>
    </div>
