<?php 

class tiposusuarios extends conexion{

		public function consultar(){
			$conn = $this->conectar();
			$data = $conn->query("SELECT * FROM tiposusuarios");
			$registros = [];
			while ($row = $data->fetch_assoc()) {
				$registros[] = $row;
			}
			return $registros;
		}

		public function guardar($datospost){
			$nombretipo = $datospost['nombretipo'];
			$conn = $this->conectar();
			$conn->query("INSERT INTO tiposusuarios VALUES(null, '".$nombretipo."')");
			if($conn->affected_rows > 0){
				return true;
			}else{
				return false;
			}

		}
	}




?>