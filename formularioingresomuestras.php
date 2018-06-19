	
<?php include("head.php"); ?>

<div class="container">
    <form id="frmIngresoMuestra" method="post" action="backend/main.php">
        <fieldset>
            <legend><h3>Ingreso de Muestras</h3></legend>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group ">
                        <label>Fecha de Envío:</label>
                        <input type="date" name="fecha" class="form-control" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group ">
                        <label>Cantidad de Gramos:</label>
                        <input type="number" name="gramos" class="form-control" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Centimetros cubicos:</label>
                        <input type="number" name="centimetroscubicos" class="form-control" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group ">
                    <label>TipoMuestra:</label>
                    <input type="text" name="idtipomuestra" class="form-control" />
                </div>

                <div class="col-lg-6">
                    <div class="form-group ">
                        <label>Estado Muestra:</label>
                        <input type="number" name="idestadomuestra" class="form-control" />      
                    </div>
                </div>

                <div class="col-lg-6">    
                    <input type="hidden" name="form" value="guardarmuestra" />            
                    <input type="submit" name="enviar" value="Enviar" class="btn btn-success" />
                </div>
            </div>
        </fieldset>
    </form>
</div>

<?php include("footer.php"); 