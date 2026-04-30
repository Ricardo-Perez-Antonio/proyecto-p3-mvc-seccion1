<?php
/**
 * Controlador de Logout
 */

function cerrarSesion() {
    session_unset();
    session_destroy();
    header('Location: index.php?view=login');
    exit();
}
?>