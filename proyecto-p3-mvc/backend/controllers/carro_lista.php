<?php

	$inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
	$tabla="";

	$campos="carros.carro_id, carros.carro_vehiculo, carros.carro_matricula, carros.carro_año, carros.carro_color, carros.carro_kilometraje, 
                carros.carro_serial_bateria, carros.carro_cliente, cliente.cliente_id";
    
    $consulta_datos="SELECT $campos FROM carros INNER JOIN cliente ON carros.carro_cliente=cliente.cliente_id WHERE carro_id= '$id' ORDER BY carro_año ASC LIMIT $inicio,$registros";
    $consulta_total="SELECT COUNT(carro_id) FROM carros WHERE carro_id= '$id'";

    $conexion =conexion();
 
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
                        <th>Nº Vehiculo</th>
                        <th>Matricula</th>
                        <th>Año</th>
                        <th>Color</th>
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
                        <td>'.$filas['carro_vehiculo'].'</td>
                        <td>'.$filas['carro_matricula'].'</td>
                        <td>'.$filas['carro_año'].'</td>
                        <td>'.$filas['carro_color'].'</td>
                        <td>
                            <a href="index.php?vista=carro_profile&carro_id_up='.$filas['carro_id'].'" class="btn-profile">Ver</a>
                            <a href="index.php?vista=carro_update&carro_id_up='.$filas['carro_id'].'" class="btn-edit">Editar</a>';
                        if ($_SESSION['rol']== 1) {
                            $tabla.='
                            <a href="'.$url.$pagina.'&carro_id_del='.$filas['carro_id'].'" class="btn-delete" onclick="return Delete()">Eliminar</a>
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

    $tabla.='   </tbody>
            </table>
            ';

    if($total>0 && $pagina<=$Npaginas){
        $tabla.='<p class="footer-table">Mostrando carros <strong>'.$paginador_inicial.'</strong> al <strong>'.$paginador_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
    }
    
    $conexion=null;
    echo $tabla;
        
    if($total>=1 && $pagina<=$Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,7);
    }
?>
<script type="text/javascript">
function Delete()
{
    var respuesta = confirm("¿Estas seguro de eliminar este estudiante?");
        
    if (respuesta == true) {
        return true;
    }else{
        return false;
    }
}
</script>