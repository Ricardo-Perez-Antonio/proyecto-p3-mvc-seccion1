<link rel="stylesheet" href="../frontend/css/carro_profile.css">

<div class="container">
    <h1>Perfil del Vehículo</h1>
    <div class="vehicle-info">
        <h2>Información del Vehículo</h2>
        <p><strong>Número de Vehículo:</strong> <?php echo $vehiculo; ?></p>
        <p><strong>Matrícula:</strong> <?php echo $matricula; ?></p>
        <p><strong>Año:</strong> <?php echo $ano; ?></p>
        <p><strong>Color:</strong> <?php echo $color; ?></p>
        <p><strong>Kilometraje:</strong> <?php echo $km; ?></p>
        <p><strong>Serial de Batería:</strong> <?php echo $bateria; ?></p>
    </div>
    <div class="service-history">
        <div class="button-container">
            <button class="add-service-btn">Agregar Servicio</button>
        </div>
        <h2>Historial de Servicios</h2>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Servicio</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01/09/2024</td>
                    <td>Cambio de Aceite</td>
                    <td>Cambio de aceite de motor y filtro</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>