<?php
	$mecanico_id=limpiar_cadena($_GET['mecanico_id_del']);

	//Verificar cliente
	$check_mecanico=conexion();
	$check_mecanico=$check_mecanico->query("SELECT mecanico_id FROM mecanicos WHERE mecanico_id = '$mecanico_id'");
	if ($check_mecanico->rowCount()==1) {

		$eliminar_mecanico=conexion();
		$eliminar_mecanico=$eliminar_mecanico->prepare("DELETE FROM mecanicos WHERE mecanico_id=:id");

		$eliminar_mecanico->execute([":id"=>$mecanico_id]);

		if($eliminar_mecanico->rowCount()==1){
			echo '
            <script>
                alert("El mecanico se elimino con exito");
                window.location = "index.php?vista=mecanico_list"
            </script>
        ';
		}else{
			echo '
            <script>
                alert("No se pudo eliminar el mecanico, por favor intente nuevamente");
                window.location = "index.php?vista=home"
            </script>
        ';
		}
		$eliminar_mecanico=null;

	}else{
		echo '
            <script>
                alert("El mecanico que intenta eliminar no existe");
                window.location = "index.php?vista=mecanico_list"
            </script>
        ';
	}
	$check_mecanico=null;