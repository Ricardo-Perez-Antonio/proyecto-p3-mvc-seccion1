<link rel="stylesheet" href="../frontend/css/search.css">

<div class="search-container">
    <form action="index.php?view=cliente_search" method="post" autocomplete="off">
        <input type="hidden" name="modulo_buscador" value="cliente">
        
        <?php if (empty($busqueda)): ?>
            <input type="text" name="txt_buscador" class="search-input" placeholder="Buscar cliente...">
            <button class="search-button" type="submit">Buscar</button>
        <?php else: ?>
            <input type="hidden" name="eliminar_buscador" value="cliente">
            <input type="text" class="search-input" value="<?php echo $busqueda; ?>" disabled>
            <button class="search-button" type="submit">Eliminar Búsqueda</button>
        <?php endif; ?>
    </form>
</div>

<?php if (!empty($busqueda) && isset($datos) && $total > 0): ?>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $contador = $inicio + 1; ?>
            <?php foreach ($datos as $cliente): ?>
            <tr>
                <td><?php echo $contador; ?></td>
                <td><?php echo $cliente['cliente_cedula']; ?></td>
                <td><?php echo $cliente['cliente_nombre']; ?></td>
                <td><?php echo $cliente['cliente_apellido']; ?></td>
                <td>
                    <a href="index.php?view=cliente_profile&cliente_id_up=<?php echo $cliente['cliente_id']; ?>" class="btn-profile">Ver</a>
                    <a href="index.php?view=cliente_update&cliente_id_up=<?php echo $cliente['cliente_id']; ?>" class="btn-edit">Editar</a>
                    <?php if ($_SESSION['rol'] == 1): ?>
                    <a href="index.php?view=cliente_eliminar&cliente_id_del=<?php echo $cliente['cliente_id']; ?>" class="btn-delete" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php $contador++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>Mostrando <strong><?php echo $inicio + 1; ?></strong> al <strong><?php echo min($inicio + $registros, $total); ?></strong> de <strong><?php echo $total; ?></strong></p>
    <?php if ($total > $registros): ?>
<div class="pagination">
    <?php if ($pagina > 1): ?>
        <a href="<?php echo $url . '1'; ?>" class="page-link">&laquo;</a>
        <a href="<?php echo $url . ($pagina - 1); ?>" class="page-link">&lsaquo;</a>
    <?php endif; ?>
    
    <?php for ($i = 1; $i <= $Npaginas; $i++): ?>
        <?php if ($i == $pagina): ?>
            <span class="page-link active"><?php echo $i; ?></span>
        <?php else: ?>
            <a href="<?php echo $url . $i; ?>" class="page-link"><?php echo $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>
    
    <?php if ($pagina < $Npaginas): ?>
        <a href="<?php echo $url . ($pagina + 1); ?>" class="page-link">&rsaquo;</a>
        <a href="<?php echo $url . $Npaginas; ?>" class="page-link">&raquo;</a>
    <?php endif; ?>
</div>
<?php endif; ?>
</div>
<?php elseif (!empty($busqueda)): ?>
<p>No se encontraron resultados para "<?php echo $busqueda; ?>"</p>
<?php endif; ?>