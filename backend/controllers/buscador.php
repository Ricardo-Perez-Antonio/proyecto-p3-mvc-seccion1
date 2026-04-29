<?php
    $modulo_buscador=limpiar_cadena($_POST['modulo_buscador']);

    $modulos=["cliente","mecanico"];

    if(in_array($modulo_buscador,$modulos)){

        $modulos_url=[
            "cliente"=>"cliente_search",
            "mecanico"=>"mecanico_search"
        ];

        $modulos_url=$modulos_url[$modulo_buscador];

        $modulo_buscador="busqueda_".$modulo_buscador;

        //Iniciar busqueda
        if(isset($_POST['txt_buscador'])){
            $txt=limpiar_cadena($_POST['txt_buscador']);

            if($txt==""){
                echo '
                    <script>
                        alert("Introduzca un termino de busqueda");
                        window.location = "../index.php?vista=home"
                    </script>
                ';
            }else{
                $_SESSION[$modulo_buscador]=$txt;
                header("Location: index.php?vista=$modulos_url",true,303);
                exit();
            }
        }
        //Eliminar busqueda
        if(isset($_POST['eliminar_buscador'])){
            unset($_SESSION[$modulo_buscador]);
			header("Location: index.php?vista=$modulos_url",true,303); 
 			exit();
        }
    }else{
        echo '
            <script>
                alert("No podemos procesar la peticion");
                window.location = "../index.php?vista=home"
            </script>
        ';
    }