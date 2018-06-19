<?php 
	class tiposmuestras extends conexion{

		public function consultar(){
			$conn = $this->conectar();
			$data = $conn->query("SELECT * FROM tiposmuestras");
			$registros = [];
			while ($row = $data->fetch_assoc()) {
				$registros[] = $row;
			}
			return $registros;
		}

		public function guardar($datospost){
			$conn = $this->conectar();
			$tiposmuestras = $datospost['idtipomuestra'];
			$conn->query("INSERT INTO tiposmuestras 
						  VALUES (null, '".$tiposmuestras."')");
			if($conn->affected_rows > 0){
				return true;
			}else{
				return false;
			}

		}
	}
