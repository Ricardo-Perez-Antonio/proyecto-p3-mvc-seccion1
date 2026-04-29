<?php
	$cliente_id=limpiar_cadena($_GET['cliente_id_del']);

	//Verificar cliente
	$check_cliente=conexion();
	$check_cliente=$check_cliente->query("SELECT cliente_id FROM cliente WHERE cliente_id = '$cliente_id'");
	if ($check_cliente->rowCount()==1) {

		$eliminar_cliente=conexion();
		$eliminar_cliente=$eliminar_cliente->prepare("DELETE FROM cliente WHERE cliente_id=:id");

		$eliminar_cliente->execute([":id"=>$cliente_id]);

		if($eliminar_cliente->rowCount()==1){
			echo '
            <script>
                alert("El cliente se elimino con exito");
                window.location = "./index.php?vista=cliente_list"
            </script>
        ';
		}else{
			echo '
            <script>
                alert("No se pudo eliminar el cliente, por favor intente nuevamente");
                window.location = "./index.php?vista=cliente_list"
            </script>
        ';
		}
		$eliminar_cliente=null;

	}else{
		echo '
            <script>
                alert("El cliente que intenta eliminar no existe");
                window.location = "./index.php?vista=cliente_list"
            </script>
        ';
	}
	$check_cliente=null;