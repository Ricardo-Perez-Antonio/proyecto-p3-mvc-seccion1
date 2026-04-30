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
        
        <?php if ($total_carros > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nº Vehículo</th>
                    <th>Matrícula</th>
                    <th>Año</th>
                    <th>Color</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $cont = $inicio_carro + 1; ?>
                <?php foreach ($carros as $carro): ?>
                <tr>
                    <td><?php echo $cont; ?></td>
                    <td><?php echo $carro['carro_vehiculo']; ?></td>
                    <td><?php echo $carro['carro_matricula']; ?></td>
                    <td><?php echo $carro['carro_año']; ?></td>
                    <td><?php echo $carro['carro_color']; ?></td>
                    <td>
                        <a href="index.php?view=carro_profile&carro_id_up=<?php echo $carro['carro_id']; ?>" class="btn-profile">Ver</a>
                        <a href="index.php?view=carro_update&carro_id_up=<?php echo $carro['carro_id']; ?>" class="btn-edit">Editar</a>
                        <?php if ($_SESSION['rol'] == 1): ?>
                        <a href="index.php?view=carro_eliminar&carro_id_del=<?php echo $carro['carro_id']; ?>" class="btn-delete" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php $cont++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No hay carros registrados para este cliente.</p>
        <?php endif; ?>
    </div>
</div>