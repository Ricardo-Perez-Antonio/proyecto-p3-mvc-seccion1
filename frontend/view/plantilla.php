<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Europists</title>

    <script src="https://kit.fontawesome.com/10e255b6d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../frontend/css/navegacion.css">

    <?php if ($view == 'login'): ?>
        <link rel="stylesheet" href="../frontend/css/login.css">
    <?php endif; ?>

    <?php if ($view != 'login'): ?>
        <?php
        $css_file = "../frontend/css/" . $view . ".css";
        if (file_exists($css_file)) {
            echo '<link rel="stylesheet" href="' . $css_file . '">';
        }
        ?>
    <?php endif; ?>
</head>
<body>

    <?php if ($es_publica): ?>
        <?php include $archivo_vista; ?>
    <?php else: ?>
        <header>
            <?php include __DIR__ . '/../../backend/include/navegacion.php'; ?>
        </header>
        <main <?php echo ($view == 'home') ? 'style="margin-top: 140px; padding: 20px;"' : ''; ?>>
            <?php include $archivo_vista; ?>
        </main>
    <?php endif; ?>

</body>
</html>