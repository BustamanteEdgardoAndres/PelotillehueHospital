<?php 
	class login extends conexion{

		public function logear($usuario){
			$conn = $this->conectar();
			$data = $conn->query("SELECT * FROM usuarios WHERE UPPER(email)='".$usuario."' LIMIT 1");
			$registros = [];
			while ($row = $data->fetch_assoc()) {
				$registros[] = $row;
			}
			return $registros;
		}

	}
