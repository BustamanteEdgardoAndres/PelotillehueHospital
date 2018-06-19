	
<?php include("head.php"); ?>
<div class="container">
    <form method="post" action="BackEnd/main.php">
        <div class="row">
                <div class="col-lg-6">
	                 <div class="form-group ">
	                    <label>NombreTipo:</label>
	                    <input type="text" name="nombretipo" class="form-control">
	                </div>
            	</div>
            	<div class="col-lg-6">    
                    <input type="hidden" name="form" value="guardartiposusuarios">
                    <input type="submit" name="enviar" value="Enviar" class="btn btn-success">
                </div>
            </div>
    </form>
</div>
<?php include("footer.php"); ?>
