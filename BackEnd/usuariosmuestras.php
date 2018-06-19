<?php 

class usuariosmuestras extends conexion{


		public function guardar($datospost){
			$idMuestras = $datospost['id_Muestras'];
			$idUsuario = $datospost['idusuario'];
			$conn = $this->conectar();
			$conn->query("INSERT INTO UsuariosMuestras VALUES(".$idUsuario.",".$idMuestras.")");
			if($conn->affected_rows > 0){
				return true;
			}else{
				return false;
			}

		}
	}




?>