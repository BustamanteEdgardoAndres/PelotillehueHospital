<?php 


 class conexion{
		public function conectar(){
			$user = "root";
	        $pass = "";
	        $host = "127.0.0.1";
	        $db = "pelotillehuemodelo";
			$conexion = new mysqli($host,$user, $pass,$db);
			return $conexion;
		}
	}
 ?>