<?php
require_once __DIR__ . '/../../include/session_start.php';
require_once __DIR__ . '/../../models/usuario_model.php';
require_once __DIR__ . '/../../models/cliente_model.php';

// Paginación
if (!isset($_GET['page'])) {
    $pagina = 1;
} else {
    $pagina = (int) $_GET['page'];
    if ($pagina <= 1) {
        $pagina = 1;
    }
}

$registros = 15;
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
$busqueda = $_SESSION['busqueda_cliente'] ?? '';

// Obtener datos del modelo
$datos = listarClientes($inicio, $registros, $busqueda);
$total = contarClientes($busqueda);
$Npaginas = ceil($total / $registros);

// URL para paginación
$url = "index.php?view=cliente_list&page=";

// Construir tabla
$tabla = '';
$tabla .= '
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
';

if ($total >= 1 && $pagina <= $Npaginas) {
    $contador = $inicio + 1;
    $paginador_inicial = $inicio + 1;
    
    foreach ($datos as $filas) {
        $tabla .= '
            <tr>
                <td>' . $contador . '</td>
                <td>' . $filas['cliente_cedula'] . '</td>
                <td>' . $filas['cliente_nombre'] . '</td>
                <td>' . $filas['cliente_apellido'] . '</td>
                <td>
                    <a href="index.php?view=cliente_profile&cliente_id_up=' . $filas['cliente_id'] . '" class="btn-profile">Ver</a>
                    <a href="index.php?view=cliente_update&cliente_id_up=' . $filas['cliente_id'] . '" class="btn-edit">Editar</a>';
        
        if ($_SESSION['rol'] == 1) {
        $tabla .= '
        <a href="index.php?view=cliente_eliminar&cliente_id_del=' . $filas['cliente_id'] . '" class="btn-delete" onclick="return confirm(\'¿Estás seguro de eliminar este cliente?\')">Eliminar</a>';
        }
        
        $tabla .= '
                </td>
            </tr>';
        $contador++;
    }
    $paginador_final = $contador - 1;
} else {
    if ($total > 1) {
        $tabla .= '
            <tr>
                <td colspan="5">
                    <a href="' . $url . '1">Haga clic acá para recargar el listado</a>
                </td>
            </tr>';
    } else {
        $tabla .= '
            <tr>
                <td colspan="5">No existen registros</td>
            </tr>';
    }
}

$tabla .= '
        </tbody>
    </table>';

if ($total > 0 && $pagina <= $Npaginas) {
    $tabla .= '<p class="footer-table">Mostrando clientes <strong>' . $paginador_inicial . '</strong> al <strong>' . $paginador_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}

// Variables para la vista
$titulo = "CLIENTES CREADOS";

// Función para paginación
function paginador_tablas($pagina, $Npaginas, $url, $botones) {
    $paginador = '<div class="pagination">';
    
    if ($pagina > 1) {
        $paginador .= '<a href="' . $url . '1" class="page-link">&laquo;</a>';
        $paginador .= '<a href="' . $url . ($pagina - 1) . '" class="page-link">&lsaquo;</a>';
    }
    
    for ($i = 1; $i <= $Npaginas; $i++) {
        if ($i == $pagina) {
            $paginador .= '<span class="page-link active">' . $i . '</span>';
        } else {
            $paginador .= '<a href="' . $url . $i . '" class="page-link">' . $i . '</a>';
        }
    }
    
    if ($pagina < $Npaginas) {
        $paginador .= '<a href="' . $url . ($pagina + 1) . '" class="page-link">&rsaquo;</a>';
        $paginador .= '<a href="' . $url . $Npaginas . '" class="page-link">&raquo;</a>';
    }
    
    $paginador .= '</div>';
    
    return $paginador;
}

// Guardar paginador en variable para la vista
$paginador = '';
if ($total >= 1 && $pagina <= $Npaginas) {
    $paginador = paginador_tablas($pagina, $Npaginas, $url, 7);
}
?>