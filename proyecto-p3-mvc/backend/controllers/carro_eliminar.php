<?php
	$carro_id=limpiar_cadena($_GET['carro_id_del']);

	//Verificar carro
	$check_carro=conexion();
	$check_carro=$check_carro->query("SELECT carro_id FROM carros WHERE carro_id = '$carro_id'");
	if ($check_carro->rowCount()==1) {

		$eliminar_carro=conexion();
		$eliminar_carro=$eliminar_carro->prepare("DELETE FROM carros WHERE carro_id=:id");

		$eliminar_carro->execute([":id"=>$carro_id]);

		if($eliminar_carro->rowCount()==1){
			echo '
            <script>
                alert("El carro se elimino con exito");
                window.location = "index.php?vista=cliente_list"
            </script>
        ';
		}else{
			echo '
            <script>
                alert("No se pudo eliminar el carro, por favor intente nuevamente");
                window.location = "index.php?vista=home"
            </script>
        ';
		}
		$eliminar_carro=null;

	}else{
		echo '
            <script>
                alert("El carro que intenta eliminar no existe");
                window.location = "index.php?vista=cliente_list"
            </script>
        ';
	}
	$check_carro=null;