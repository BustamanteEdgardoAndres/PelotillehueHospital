<?php 
	class usuarios extends conexion{

		public function consultar(){
			$conn = $this->conectar();
			$data = $conn->query("SELECT usr.*, tipusr.* FROM usuarios usr LEFT JOIN tiposusuarios tipusr ON usr.idtipousuario = tipusr.idTiposUsuario");
			$registros = [];
			while ($row = $data->fetch_assoc()) {
				$registros[] = $row;
			}
			return $registros;
		}

		public function guardar($datospost){
			$rut = $datospost['rut'];                        
			$nombre = $datospost['nombre'];
			$direccion = $datospost['direccion'];
			$email = $datospost['email'];
			$telefono = $datospost['telefono'];
			$contrasena = password_hash($datospost['contrasena'], PASSWORD_DEFAULT);
			$tipousuario = $datospost['idtipousuario'];
			$conn = $this->conectar();
			$conn->query("INSERT INTO 
								usuarios 
						  VALUES
						  		(null, '".$rut."','".$nombre."','".$direccion."','".$email."',".$telefono.", ".$tipousuario." ,'".$contrasena."')");
			if($conn->affected_rows > 0){
				return true;
			}else{
				return false;
			}

		}
	}
