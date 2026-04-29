<div class="nav">
    <div class="header_superior">
        <div class="logo">
            <img src="../frontend/img/logotaller.png" alt="">
        </div>
        <div class="usuario">
            <div class="img">
                <ion-icon name="person-outline"></ion-icon>
            </div>
            <p><?php echo $_SESSION['usuario']; ?></p>
        </div>
    </div>
    <div class="container__menu">
        <div class="menu">
            <input type="checkbox" id="check__menu">
            <label id="label__check" for="check__menu">
                <i class="fa-solid fa-bars icon__menu"></i>
            </label>
            <nav>
                <ul>
                    <li><a href="index.php?vista=home" id="select"></a></li>
                    <li><a href="#">Clientes</a>
                        <ul>
                            <li><a href="index.php?vista=cliente_new">Crear Cliente</a></li>
                            <li><a href="index.php?vista=cliente_list">Ver Clientes</a></li>
                            <li><a href="index.php?vista=cliente_search">Buscar Clientes</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Mecanicos</a>
                        <ul>
                            <li><a href="index.php?vista=mecanico_new">Crear Mecanico</a></li>
                            <li><a href="index.php?vista=mecanico_list">Ver Mecanicos</a></li>
                            <li><a href="index.php?vista=mecanico_search">Buscar Mecanico</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Inventario</a>
                        <ul>
                            <li><a href="index.php?vista=producto_new">Crear Producto</a></li>
                            <li><a href="index.php?vista=inventario_list">Ver Inventario</a></li>
                            <li><a href="index.php?vista=producto_search">Buscar Producto</a></li>
                        </ul>
                    </li>
                    <?php
                    if ($_SESSION['rol']==1) {
                    ?>
                    <li><a href="#">Usuarios</a>
                        <ul>
                            <li><a href="index.php?vista=user_new">Crear Usuario</a></li>
                            <li><a href="index.php?vista=user_list">Ver Usuarios</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <li><a href="index.php?vista=cambiar_credenciales">Cambiar Credenciales</a></li>
                    <li><a class="cerrar" href="index.php?vista=logout">Cerrar Session</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</div>