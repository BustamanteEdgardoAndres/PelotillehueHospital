	
<?php 
    include("head.php");
    include ("BackEnd/conexion.php");
    $conexion = new conexion();
    $conn = $conexion->conectar();
?>
<div class="container">
<form method="post" action="backend/main.php">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group ">
                    <label>Rut:</label>
                    <input type="text" name="rut" class="form-control">
                </div>
            </div>
                <!---->
                <div class="col-lg-6">
                 <div class="form-group ">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control">
                    
                </div>
            </div>
                <!---->
                <div class="col-lg-6">
	                 <div class="form-group ">
	                    <label>Direccion:</label>
	                    <input type="text" name="direccion" class="form-control">
	                    
	                </div>
	            </div>

                <!---->
                <div class="col-lg-6">
                 <div class="form-group ">
                    <label>Email:</label>
                    <input type="Email" name="email" class="form-control">
                   
                </div>
            </div>
                <!---->
                <div class="col-lg-6">
                 <div class="form-group ">
                    <label>Contraseña:</label>
                    <input type="password" name="contrasena" class="form-control">      
                </div>
            </div>
                <!---->
                <div class="col-lg-6">
                 <div class="form-group ">
                    <label>Telefono:</label>
                    <input type="text" name="telefono" class="form-control">
                </div>
            </div>
                <!---->
                <div class="col-lg-6">
	                 <div class="form-group ">
                        <label> Tipo Usuario;  </label> 
	                    <select class="form-control" name="idtipousuario">
                            <?php
                                $data = $conn->query("SELECT * FROM tiposusuarios");
                                while($row = $data->fetch_assoc()){
                                    echo "<option value='".$row['idTiposUsuario']."'>".$row['descripcion']."</option>";
                                }
                            ?>
                        </select>                            
	                </div>
            	</div>
            	<div class="col-lg-6">    
                    <input type="hidden" name="form" value="guardarusuarios">            
        			<input type="submit" name="enviar" value="Enviar" class="btn btn-success">
    		</div>
            </div>
        </div>
        </form>
</div>
<?php include("footer.php"); 
