	
<?php include("head.php"); 
    include ("BackEnd/conexion.php");
    $conexion = new conexion();
    $conn = $conexion->conectar();?>
<div class="container">
    <form method="post" action="BackEnd/main.php">
        <div class="row">
                <div class="col-lg-6">
	                 <div class="form-group">
	                    <label>Asignar Muestras</label>
                        <select class="form-control" name="id_Muestras">
                            <?php
                                $data = $conn->query("SELECT ingm.*, tipm.*, usr.*
                                 FROM ingresomuestras ingm LEFT JOIN tiposmuestras tipm ON
                                 ingm.TiposMuestras_id_TipoMuestra = tipm.id_TipoMuestra

                                 LEFT JOIN UsuariosMuestras usrMts ON (usrMts.IngresoMuestras_id_Muestras = ingm.id_Muestras)
                                 LEFT JOIN Usuarios usr ON (usrMts.Usuarios_idUsuarios = usr.idUsuarios)   

                                 ");
                                while($row = $data->fetch_assoc()){
                                    echo "<option value='".$row['id_Muestras']."'>".$row['descripcion'].",".$row['fecha_recepcion'].",".$row['cantidad_gramos'].",".$row['cantidad_cm_cubicos']."</option>";
                                }
                            ?>
                        </select>  
	                    <input type="hidden" name="form" value="guardarMuestraUsuario">
                        <input type="hidden" name="idusuario" value="<?= $_GET['id']; ?>">
                        <input type="submit" name="enviar" value="Asignar" class="btn btn-success">
                        <a href="formularioingresomuestras.php" class="btn btn-success">Crear nueva muestra</a>
                    </div>
            	</div>
            </div>
    </form>

     <table style="width:100%; margin-top:25px;" class="table">
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Cantidad Gramos</th>
            <th>Cantidad CmCubicos</th>
            <th>Nombre Usuario</th>
          </tr>
          <?php
            $html = "";
            $idusuario = $_GET['id'];
            $data = $conn->query("SELECT usrm.*, inm.*, usr.* FROM UsuariosMuestras usrm 
                                LEFT JOIN IngresoMuestras inm ON (usrm.IngresoMuestras_id_Muestras = inm.id_Muestras)
                                LEFT JOIN Usuarios usr ON (usrm.Usuarios_idUsuarios = usr.idUsuarios)
                                WHERE usrm.Usuarios_idUsuarios = ".$idusuario
                            );
                while($value = $data->fetch_assoc()){
                    $html .=  '<tr>
                                    <td>'.$value["id_Muestras"].'</td>
                                    <td>'.$value["fecha_recepcion"].'</td>
                                    <td>'.$value["cantidad_gramos"].'</td>
                                    <td>'.$value["cantidad_cm_cubicos"].'</td>
                                    <td>'.$value["nombre"].'</td>
                                </tr>';
                }

                if($html == ""){
                    echo "<tr><td colspan='5'>El usuario no tiene muestras</td></tr>";
                }else{
                    echo $html;
                }
          ?>
                 
</div>
