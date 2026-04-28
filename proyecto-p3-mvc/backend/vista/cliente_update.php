<?php
	require_once 	require_once "../controllers/main.php";SERVER['DOCUMENT_ROOT'] . '/Taller/proyecto-p3-mvc/backend/controllers/main.php";

	$id = (isset($_GET['cliente_id_up'])) ? $_GET['cliente_id_up'] : 0;
	$id=limpiar_cadena($id);

	$check_cliente=conexion();
	$check_cliente=$check_cliente->query("SELECT * FROM cliente WHERE cliente_id='$id'");
	if($check_cliente->rowCount()>0){
		$datos=$check_cliente->fetch();

        $nombre=$datos['cliente_nombre'];
        $apellido=$datos['cliente_apellido'];
        $cedula=$datos['cliente_cedula'];
        $principal=$datos['cliente_num'];
        $secundario=$datos['cliente_num2'];

        if ($cedula!="") {
            $n=substr($cedula, 0,2);
            $cedu=substr($cedula, -8);
          }else{
            $n="";
            $cedu="";
          }

        if ($principal!="") {
            $codiprin=substr($principal, 0,5);
            $princi=substr($principal, -7);
          }else{
            $codiprin="";
            $princi="";
          }
      
          if ($secundario!="") {
            $codisecu=substr($secundario, 0,5);
            $secu=substr($secundario, -7);
          }else{
            $codisecu="";
            $secu="";
          }
    
?>
<form action="../controllers/cliente_editar.php" method="post" autocomplete="off">
        <h2>EDITAR CLIENTE</h2>

        <input type="hidden" name="cliente_id" value="<?php echo $datos['cliente_id'];?>" required>

        <div class="field-group">
            <label for="nombre">Nombre:<span>*</span></label>
            <input type="text" name="name" id="nombre" value="<?php echo $nombre;?>" required>
        </div>

        <div class="field-group">
            <label for="ape">Apellido:<span>*</span></label>
            <input type="text" name="ape" id="ape" value="<?php echo $apellido;?>" required>
        </div>

        <div class="field-group">
            <label for="id">Cédula de Identidad:<span>*</span></label>
            <div class="id-input">
                <?php
                if ($n == "V-") {
                ?>
                    <select name="n" id="id-select">
                        <option value="V-" selected>V-</option>
                        <option value="E-">E-</option>
                        <option value="R.I.F-">R.I.F-</option>
                    </select>
                    <input type="text" placeholder="30.715.180" name="cedu" value="<?php echo $cedu;?>" required>
                <?php
                }elseif($n == "E-") {
                ?>
                    <select name="n" id="id-select">
                        <option value="V-">V-</option>
                        <option value="E-" selected>E-</option>
                        <option value="R.I.F-">R.I.F-</option>
                    </select>
                    <input type="text" placeholder="30.715.180" name="cedu" value="<?php echo $cedu;?>" required>
                <?php
                }else{
                ?>
                    <select name="n" id="id-select">
                        <option value="V-">V-</option>
                        <option value="E-">E-</option>
                        <option value="R.I.F-" selected>R.I.F-</option>
                    </select>
                    <input type="text" placeholder="30.715.180" name="cedu" value="<?php echo $cedu;?>" required>
                <?php
                }?>
            </div>
        </div>

        <div class="phone-group">
            <label for="">Numero de Telefono:</label>
            <div class="phone-field">
                <label for="habit">Principal:</label>
                <div class="phone-input">
                    <?php
                    if ($codiprin == "0412-") {
                    ?>
                        <select name="codiprin">
                            <option value="">-Seleccione-</option>
                            <option value="0412-" selected>0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="princi" value="<?php echo $princi;?>"><br>
                    <?php
                    }elseif($codiprin == "0414-") {
                    ?>
                        <select name="codiprin">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-" selected>0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="princi" value="<?php echo $princi;?>"><br>
                    <?php
                    }elseif($codiprin == "0424-") {
                    ?>
                        <select name="codiprin">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-" selected>0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="princi" value="<?php echo $princi;?>"><br>
                    <?php
                    }elseif($codiprin == "0416-") {
                    ?>
                        <select name="codiprin">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-" selected>0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="princi" value="<?php echo $princi;?>"><br>
                    <?php
                    }elseif ($codiprin == "0426-"){
                    ?>
                        <select name="codiprin">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-" selected>0426-</option>
                        </select><input type="text" name="princi" value="<?php echo $princi;?>"><br>
                    <?php
                    }else{
                    ?>
                        <select name="codiprin">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="princi" value="<?php echo $princi;?>"><br>
                    <?php
                    }?>
                </div>
            </div>

            <div class="phone-field">
                <label for="celu">Secundario:</label>
                <div class="phone-input">
                    <?php
                    if ($codisecu == "0412-") {
                    ?>
                        <select name="codisecu">
                            <option value="">-Seleccione-</option>
                            <option value="0412-" selected>0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="secu" value="<?php echo $secu; ?>"><br>
                    <?php
                    }elseif($codisecu == "0414-") {
                    ?>
                        <select name="codisecu">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-" selected>0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="secu" value="<?php echo $secu; ?>"><br>
                    <?php
                    }elseif($codisecu == "0424-") {
                    ?>
                        <select name="codisecu">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-" selected>0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="secu" value="<?php echo $secu; ?>"><br>
                    <?php
                    }elseif($codisecu == "0416-") {
                    ?>
                        <select name="codisecu">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-" selected>0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="secu" value="<?php echo $secu; ?>"><br>

                    <?php
                    }elseif ($codisecu == "0426-"){
                    ?>
                        <select name="codisecu">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-" selected>0426-</option>
                        </select><input type="text" name="secu" value="<?php echo $secu; ?>"><br>
                    <?php
                    }else{
                    ?>
                        <select name="codisecu">
                            <option value="">-Seleccione-</option>
                            <option value="0412-">0412-</option>
                            <option value="0414-">0414-</option>
                            <option value="0424-">0424-</option>
                            <option value="0416-">0416-</option>
                            <option value="0426-">0426-</option>
                        </select><input type="text" name="secu" value="<?php echo $secu; ?>"><br>
                    <?php
                    }?>  
                </div>
            </div>
        </div>

        <span>Los campos obligatorios están marcados con un asterisco rojo *</span>

        <div class="btns">
            <button type="submit" name="crear">Editar</button>
        </div>
    </form>
<?php
	}else{
		echo '
            <script>
                alert("No podemos obtener la informacion solicitada");
                window.location = "index.php?vista=cliente_list"
            </script>
            ';
	}
	$check_cliente=null;
?>
