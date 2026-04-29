<?php

	$inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
	$tabla="";

    if(isset($busqueda) && $busqueda!=""){
        $consulta_datos="SELECT * FROM mecanicos WHERE mecanico_cedula LIKE '%$busqueda%' OR mecanico_nombre LIKE '%$busqueda%' OR mecanico_apellido LIKE '%$busqueda%' ORDER BY mecanico_cedula ASC LIMIT $inicio,$registros";
        $consulta_total="SELECT COUNT(mecanico_id) FROM mecanicos WHERE mecanico_cedula LIKE '%$busqueda%' OR mecanico_nombre LIKE '%$busqueda%' OR mecanico_apellido LIKE '%$busqueda%'";

    }else{
        $consulta_datos="SELECT * FROM mecanicos ORDER BY mecanico_cedula ASC LIMIT $inicio,$registros";
        $consulta_total="SELECT COUNT(mecanico_id) FROM mecanicos";
    }

	$conexion=conexion();

	$datos=$conexion->query($consulta_datos);
	$datos=$datos->fetchALL();

	$total=$conexion->query($consulta_total);
	$total=(int) $total->fetchColumn();

	$Npaginas=ceil($total/$registros);

	$tabla.='
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

    if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$paginador_inicial=$inicio+1;
		foreach($datos as $filas) {
			$tabla.='
            <tr>
                    <td>'.$contador.'</td>
                    <td>'.$filas['mecanico_cedula'].'</td>
                    <td>'.$filas['mecanico_nombre'].'</td>
                    <td>'.$filas['mecanico_apellido'].'</td>
                    <td>
                        <a href="index.php?vista=mecanico_profile&mecanico_id_up='.$filas['mecanico_id'].'" class="btn-profile">Ver</a>
                        <a href="index.php?vista=mecanico_update&mecanico_id_up='.$filas['mecanico_id'].'" class="btn-edit">Editar</a>';
                        if ($_SESSION['rol']== 1) {
                            $tabla.='
                            <a href="'.$url.$pagina.'&mecanico_id_del='.$filas['mecanico_id'].'" class="btn-delete" onclick="return Delete()">Eliminar</a>
                            </td>
                            </tr>
                            ';
                        }
        $contador++;
        }
        $paginador_final=$contador-1;

    }else{
		if($total>1){
			$tabla.='
			<tr>
				<td>
					<a href="'.$url.'1">
						Haga clic acá para recargar el listado
					</a>
				</td>
			</tr>
			';
		}else{
			$tabla.='
			<tr>
				<td>No existen registros</td>
			</tr>
			';
		}
	}

    $tabla.='
    </tbody>
        </table>
    ';

    if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="footer-table">Mostrando mecanicos <strong>'.$paginador_inicial.'</strong> al <strong>'.$paginador_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}
	'</form>';
?>
<script type="text/javascript">
    function Delete()
    {
        var respuesta = confirm("¿Estas seguro de eliminar este mecanico?");

        if (respuesta == true) {
            return true;
        }else{
            return false;
        }
    }
</script>