    <main>
    <?php
        require_once         require_once "../controllers/main.php";SERVER['DOCUMENT_ROOT'] . '/Taller/proyecto-p3-mvc/backend/controllers/main.php";

        if(isset($_POST['modulo_buscador'])){
            require_once             require_once "../controllers/buscador.php";SERVER['DOCUMENT_ROOT'] . '/Taller/proyecto-p3-mvc/backend/controllers/buscador.php";
        }

        if(!isset($_SESSION['busqueda_mecanico']) && empty($_SESSION['busqueda_mecanico'])){
    ?>
        <div class="search-container">
            <form action="" method="post" autocomplete="off">
                <input type="hidden" name="modulo_buscador" value="mecanico">
                <input type="text" name="txt_buscador" class="search-input" placeholder="Buscar mecanico...">
                <button class="search-button" type="submit">Buscar</button>
            </form>
        </div>
    <?php
    }else{
    ?>
        <div class="search-container">
            <form action="" method="post" autocomplete="off">
                <input type="hidden" name="modulo_buscador" value="mecanico">
                <input type="hidden" name="eliminar_buscador" value="mecanico">
                <input type="text" class="search-input" value="<?php echo $_SESSION['busqueda_mecanico']; ?>">
                <button class="search-button" type="submit">Eliminar Busqueda</button>
            </form>
        </div>
        <div class="table-container">
            <?php
            //Eliminar cliente
            if(isset($_GET['mecanico_id_del'])){
                require_once                 require_once "../controllers/mecanico_eliminar.php";SERVER['DOCUMENT_ROOT'] . '/Taller/proyecto-p3-mvc/backend/controllers/mecanico_eliminar.php";
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
            $url="index.php?vista=mecanico_search&page=";
            $registros=15;
            $busqueda=$_SESSION['busqueda_mecanico'];

            require_once '../controllers/mecanico_lista.php';
            }
            ?>
        </div>
    </main>
