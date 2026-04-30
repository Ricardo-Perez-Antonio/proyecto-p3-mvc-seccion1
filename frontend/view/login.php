<div class="container">
    <div class="container-form">
        <form class="sign-in" method="post" action="index.php?view=iniciar-sesion" autocomplete="off">
            <h2>Iniciar Sesión</h2>
            <span>Use su usuario y contraseña</span>
            
            <?php if (isset($error)): ?>
                <div class="alerta-error">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <div class="container-input">
                <ion-icon name="person-outline"></ion-icon>
                <input type="text" name="usuario" placeholder="Usuario">
            </div>
            <div class="container-input">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="password" placeholder="Password">
            </div>
            <a href="#">¿Olvidaste tu contraseña?</a>
            <button type="submit" class="button">INICIAR SESIÓN</button>
        </form>
    </div>

    <div class="container-form"></div>

    <div class="container-welcome">
        <div class="welcome-sign-up welcome">
            <h3>¡Bienvenido!</h3>
            <p>SISTEMA DE CONTROL DE EUROPITS</p>
        </div>
    </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>