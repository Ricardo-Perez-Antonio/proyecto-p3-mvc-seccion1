<link rel="stylesheet" href="../frontend/css/cliente_profile.css">

<div class="profile-container">
    <h1 class="profile-title">PERFIL DE CLIENTE</h1>
    
    <div class="profile-header">
        <div class="profile-image">
            <img src="../frontend/img/cliente.png" alt="Imagen de perfil">
        </div>
        <div class="profile-info">
            <div class="info-line">
                <span class="info-item">Nombre: <?php echo $nombre; ?></span>
                <span class="info-item">Apellido: <?php echo $apellido; ?></span>
                <span class="info-item">Cédula/R.I.F: <?php echo $cedula; ?></span>
            </div>
            <div class="info-line">
                <span class="info-item">Teléfono 1: <?php echo $principal; ?></span>
                <span class="info-item">Teléfono 2: <?php echo $secundario; ?></span>
            </div>
        </div>
    </div>
    
    <div class="car-table">
        <a href="index.php?view=carro_new&cliente_id_up=<?php echo $id; ?>" class="add-car-button">Agregar Carro</a>
        <h2>CARROS REGISTRADOS</h2>
        <!-- Aquí irá la lista de carros después -->
    </div>
</div>