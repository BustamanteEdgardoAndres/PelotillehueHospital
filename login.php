<?php
    include ("head.php");
?>
<div class="container">
	<form method="post" action="backend/main.php">
		<div class="row">
	        <div class="col-lg-6">
	        	<h1>Iniciar Sesión</h1>
	            <div class="form-group ">
	                <label>Usuario:</label>
	                <input type="text" name="usuario" class="form-control">
	            </div>
	            <div class="form-group ">
	                <label>Contraseña:</label>
	                <input type="password" name="contrasena" class="form-control">
	            </div>
	            <input type="hidden" name="form" value="login">
	            <input type="submit" name="enviar" value="Ingresar" class="btn btn-success">
	        </div>
		</div>
	</form>	
</div>	
<?php include ("footer.php");