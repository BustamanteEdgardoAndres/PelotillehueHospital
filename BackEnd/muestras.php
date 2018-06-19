<?php 
	class muestras extends conexion{

		public function consultar(){
			$conn = $this->conectar();
			$data = $conn->query("SELECT ingm.*, tipm.*
								 FROM ingresomuestras ingm LEFT JOIN tiposmuestras tipm ON
								 ingm.TiposMuestras_id_TipoMuestra = tipm.id_TipoMuestra");
			$registros = [];
			while ($row = $data->fetch_assoc()) {
				$registros[] = $row;
			}
			return $registros;
		}

		public function guardar($datospost){
			$fecha = $datospost['fecha'];                   
			$gramos = $datospost['gramos'];
			$cmcubicos = $datospost['centimetroscubicos'];
			$tipomuestra = $datospost['idtipomuestra'];
			$estadomuestra = $datospost['idestadomuestra'];
			$conn = $this->conectar();
			$conn->query("INSERT INTO ingresomuestras 
						  VALUES
        		(null, '".$fecha."',".$gramos.",".$cmcubicos.",".$tipomuestra.",".$estadomuestra.")");	
			if($conn->affected_rows > 0){
				return true;
			}else{
				return false;
			}

		}

			public function cantidadMuestras(){
			$conn = $this->conectar();
			$data = $conn->query("select count(*) AS total from ingresomuestras");
			$registros = [];
			while ($row = $data->fetch_assoc()) {
				$registros[] = $row;
			}
			return $registros;
		}
	}
