        
    <div class="container">
        <div class="container-form">
            <form class="sign-in" method="post" action="" autocomplete="off">
                <h2>Iniciar Sesión</h2>
                <span>Use su usuario y contraseña</span>
                <div class="container-input">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="usuario" placeholder="Usuario">
                </div>
                <div class="container-input">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button class="button">INICIAR SESIÓN</button>

                <?php
                if (isset($_POST['usuario']) && isset($_POST['password'])) {
                    require_once $_SERVER['DOCUMENT_ROOT'] . "/Taller/proyecto-p3-mvc/backend/controllers/main.php";
                    require_once $_SERVER['DOCUMENT_ROOT'] . "/Taller/proyecto-p3-mvc/backend/controllers/iniciar_session.php";
                }
                ?>
            </form>
        </div>

        <div class="container-form"></div>

        <div class="container-welcome">
            <div class="welcome-sign-up welcome">
                <h3>¡Bienvenido!</h3>
                <p>SISTEMA DE CONTROL DE EUROPITS</p>
            </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
