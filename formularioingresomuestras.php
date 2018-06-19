	
<?php include("head.php"); 
 include ("BackEnd/conexion.php");
    $conexion = new conexion();
    $conn = $conexion->conectar();
?>
<div class="container">
<form id="frmIngresoMuestra" method="post" action="backend/main.php">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group ">
                    <label>Fecha de Envío:</label>
                    <input type="date" name="fecha" class="form-control">
                </div>
            </div>
                <!---->
                <div class="col-lg-6">
                 <div class="form-group ">
                    <label>Cantidad de Gramos:</label>
                    <input type="number" name="gramos" class="form-control">
                    
                </div>
            </div>
                <!---->
                <div class="col-lg-6">
	                 <div class="form-group ">
	                    <label>Centimetros cubicos:</label>
	                    <input type="number" name="centimetroscubicos" class="form-control">
	                    
	                </div>
	            </div>

                <!---->
                  <div class="col-lg-6">
                     <div class="form-group ">
                        <label>Tipo de Analisís</label>
                        <select class="form-control" name="idtipomuestra">
                            <?php
                                $data = $conn->query("SELECT * FROM TiposMuestras");
                                while($row = $data->fetch_assoc()){
                                    echo "<option value='".$row['id_TipoMuestra']."'>".$row['descripcion']."</option>";
                                }
                            ?>
                        </select>                            
                    </div>
                </div>
                <!--  
                <div class="col-lg-6">
                    <div class="form-group ">
                        <label>TipoMuestra:</label>
                        <input type="text" name="idtipomuestra" class="form-control">
                    </div>
                </div> -->
                   <!---->
                
                <div class="col-lg-6">
                    <div class="form-group ">
                        <input type="hidden" name="idestadomuestra" value="1" class="form-control">      
                    </div>
            </div>
                <!---->
            	<div class="col-lg-6">    
                    <input type="hidden" name="form" value="guardarmuestra">  
                    <input type="submit" name="enviar" value="Enviar" class="btn btn-success">
		        </div>
            </div>
        </div>
        </form>
</div>
<?php include("footer.php"); 
