<?php 
	class estadomuestra extends conexion{

		public function consultar(){
			$conn = $this->conectar();
			$data = $conn->query("SELECT * FROM estadomuestra");
			$registros = [];
			while ($row = $data->fetch_assoc()) {
				$registros[] = $row;
			}
			return $registros;
		}

		public function guardar($datospost){
			$descripcion = $datospost['descripcion'];                        
			$conn = $this->conectar();
			$conn->query("INSERT INTO estadomuestra 
						  VALUES
        		(null, '".$descripcion."')");
			if($conn->affected_rows > 0){
				return true;
			}else{
				return false;
			}

		}
	}
