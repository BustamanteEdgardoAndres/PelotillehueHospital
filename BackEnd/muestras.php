<?php 
	class muestras extends conexion{

		public function consultar(){
			$conn = $this->conectar();
		/*	"SELECT usr.*, tipusr.* FROM usuarios usr LEFT JOIN tiposusuarios tipusr ON usr.idtipousuario = tipusr.idTiposUsuario");*/
			$data = $conn->query("SELECT * FROM ingresomuestras");
			$registros = [];
			while ($row = $data->fetch_assoc()) {
				$registros[] = $row;
			}
			return $registros;
		}

		public function guardar($datospost){
			//var_dump($datospost); exit();
			$fecha = $datospost['fecha'];                        
			$gramos = $datospost['gramos'];
			$cmcubicos = $datospost['centimetroscubicos'];
			$tipomuestra = $datospost['idtipomuestra'];
			$estadomuestra = $datospost['idestadomuestra'];
			$conn = $this->conectar();
			$conn->query("INSERT INTO ingresomuestras 
						  VALUES
        		(null, ".$fecha.",".$gramos.",".$cmcubicos.",".$tipomuestra.",".$estadomuestra.")");	
			if($conn->affected_rows > 0){
				return true;
			}else{
				return false;
			}

		}
	}
