<?php 
	include("conexion.php");
	include("usuarios.php");
	include("tiposusuarios.php");
  include("tiposmuestras.php");
  include("estadomuestra.php");
  include("muestras.php");
  include("UsuariosMuestras.php");
  include("login.php");

	$usuarios = new usuarios();
	$tiposusuarios = new tiposusuarios();
  $tiposmuestras = new tiposmuestras();
  $estadomuestra = new estadomuestra();
  $usuariomuestra= new usuariosmuestras();
  $login = new login();
  $muestras = new muestras();

	if(isset($_GET['form']))
     {
    switch ($_GET['form']) 
    {
      case 'consultartiposusuarios':
              include("../head.php");
              $html = "<div class='container'>";
              $html .= '<a href="formulariotiposusuarios.php" class="btn btn-success">Crear Tipo Usuario</a>';
              $html .= '<table style="width:100%" class="table">
                                <tr>
                                  <th>Id</th>
                                  <th>Nombre del Tipo</th> 
                                </tr>';
              foreach ($tiposusuarios->consultar() as $key => $value) {
                  $html .= 	'<tr>
                                <td>'.$value["idTiposUsuario"].'</td>
                                <td>'.$value["descripcion"].'</td>
                            </tr>';
              }
              $html .= '</table></div>';
              echo $html;
              include("../footer.php");
      break;

      case 'consultarusuarios':
              include("../head.php");
              $html = "<div class='container'>";
              $html .= '<table style="width:100%" class="table">
                          <tr>
                            <th>Id Usuario</th>
                            <th>Rut</th> 
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Tipo Usuario</th>
                            <th>Acciones</th>
                          </tr>';
                          foreach ($usuarios->consultar() as $key => $value) {
                              $html .=  '<tr>
                                    <td>'.$value["idUsuarios"].'</td>
                                    <td>'.$value["rut"].'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["direccion"].'</td>
                                    <td>'.$value["email"].'</td>
                                    <td>'.$value["telefono"].'</td>
                                    <td>'.$value["descripcion"].'</td>
                                    <td><a href="formularioMuestraUsuario.php?id='.$value["idUsuarios"].'">Asignar Muestra</a></td>
                            </tr>';
                                }
              $html .= '</table></div>';
              echo $html;

              include("../footer.php");
      break;

      case 'consultartiposmuestras':
          include("../head.php");
          $html = "<div class='container'>";
          $html .= '<a href="formulariotipomuestra.php" class="btn btn-success">Crear nuevo tipo de Muestra</a>';
          $html .= '<table style="width:100%" class="table">
                <tr>
                  <th>Id</th>
                  <th>Tipo de Muestra</th> 
                </tr>';
                foreach ($tiposmuestras->consultar() as $key => $value) {
                  $html .=  '<tr>
                      <td>'.$value["id_TipoMuestra"].'</td>
                      <td>'.$value["descripcion"].'</td>
              </tr>';
                }
          $html .= '</table></div>';
          echo $html;
          
          include("../footer.php");
        break;



        case 'consultarestado':
          include("../head.php");
          $html = "<div class='container'>";
          $html .= '<a href="formularioestadomuestra.php" class="btn btn-success">Crear nuevo estado</a>';
          $html .= '<table style="width:100%" class="table">
                    <tr>
                  <th>Id</th>
                  <th>Tipo de Muestra</th> 
                </tr>';
                foreach ($estadomuestra->consultar() as $key => $value) {
                  $html .=  '<tr>
                      <td>'.$value["id_EstadoMuestra"].'</td>
                      <td>'.$value["descripcion"].'</td>
              </tr>';
                }
          $html .= '</table></div>';
          echo $html;
          
          include("../footer.php");
        break;

          case 'consultarmuestra':
            include("../head.php");
            $html = "<div class='container'>";
            $html .= '<a href="formularioingresomuestras.php" class="btn btn-success">Crear nueva muestra</a>';
            $html.='<a class="btn btn-success" href="BackEnd/main.php?form=cantidadMuestras"> Cantidad Muestras</a>' ;
            $html .= '<table style="width:100%" class="table">
                      <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Cantidad Gramos</th>
                    <th>Cantidad CmCubicos</th>
                    <th>Tipo Muestra</th>

                  </tr>';
                  foreach ($muestras->consultar() as $key => $value) {
                    $html .=  '<tr>
                        <td>'.$value["id_Muestras"].'</td>
                        <td>'.$value["fecha_recepcion"].'</td>
                        <td>'.$value["cantidad_gramos"].'</td>
                        <td>'.$value["cantidad_cm_cubicos"].'</td>
                        <td>'.$value["descripcion"].'</td>
                </tr>';
                  }
            $html .= '</table></div>';
            echo $html;
          
          include("../footer.php");
        break;
  
        case 'cantidadMuestras':
              include("../head.php");
              $html = "<div class='container'>";
              $html .= '<a href="formularioingresomuestras.php" class="btn btn-success">Crear Muestra </a>';
              $html .= '<table style="width:100%" class="table">
                                <tr>
                                  <th>Total: </th> 
                                </tr>';
              foreach ($muestras->cantidadMuestras() as $key => $value) {
                  $html .=  '<tr>
                                <td>'.$value["total"].'</td>;
                            </tr>';
              }
              $html .= '</table></div>';
              echo $html;
              include("../footer.php");
           break;

           case 'cerrarsesion':
              session_start();
              $_SESSION = [];
              session_destroy();
              header("location: ../index.php");
           break;

            }

        }

	if(isset($_POST['form'])){

		switch ($_POST['form']) {

			case 'guardartiposusuarios':
				include("../head.php");
				$respuesta = $tiposusuarios->guardar($_POST);
				if($respuesta){
					echo "<h1>Datos Guardados</h1>";
					echo  '<a href="main.php?form=consultartiposusuarios" class="btn btn-success">Ver registros</a>';
				}else{
					echo "<h1>Datos no se pudieron guardar</h1>";
				}
				
				include("../footer.php");
			break;

      case 'guardarusuarios':
        include("../head.php");
        $respuesta = $usuarios->guardar($_POST);
        if($respuesta)
        {
          echo "<h1> Usuario ingresado correctamente</h1>";
        }
        else
        {
          "<h1>Datos no se pudieron guardar</h1>";
        }
        include("../footer.php");
        break;

        case 'guardartiposmuestras':
            include("../head.php");
            $respuesta = $tiposmuestras->guardar($_POST);
            if($respuesta)  
            {
                echo "<h1> Muestra Ingresada ingresado correctamente</h1>";
                echo  '<a href="main.php?form=consultartiposmuestras" class="btn btn-success">Ver Muestras</a>';
            }
            else
            {
                    "<h1>Datos no se pudieron guardar</h1>";
            }
            include("../footer.php");
      break;

         case 'guardarestadomuestras':
            include("../head.php");
            $respuesta = $estadomuestra->guardar($_POST);
            if($respuesta)  
            {
                echo "<h1>Muestra Ingresada</h1>";
                echo  '<a href="main.php?form=consultarestado" class="btn btn-success">Ver Muestras</a>';
            }
            else
            {
                    "<h1>Datos no se pudieron guardar</h1>";
            }
            include("../footer.php");
      break;

       case 'guardarmuestra':
            include("../head.php");
            $respuesta = $muestras->guardar($_POST);
            if($respuesta)  
            {
                echo "<h1>Muestra Ingresda</h1>";
                echo  '<a href="BackEnd/main.php?form=consultarmuestra" class="btn btn-success">Ver Muestra</a>';
            }
            else
            {
                   echo "<h1>Datos no se pudieron guardar</h1>";
            }
            include("../footer.php");
      break;

      case 'guardarMuestraUsuario':
            include("../head.php");
            $respuesta = $usuariomuestra->guardar($_POST);
            if($respuesta)  
            {
                echo "<h1>Muestra Asociada de Manera Correcta</h1>";
                echo  '<a href="BackEnd/main.php?form=consultarusuarios" class="btn btn-success">Ver Usuarios</a>';
            }
            else
            {
                   echo "<h1>Datos no se pudieron guardar</h1>";
            }
            include("../footer.php");
      break;

       case 'login':
            $usuario = $_POST['usuario'];
            $pass = $_POST['contrasena'];
            $res = $login->logear(strtoupper(trim($usuario)));

            if(count($res) == 1){
              if(password_verify($pass, $res[0]['contrasena'])){
                session_start();
                session_id();
                $_SESSION['id'] = rand(9,999);
                $_SESSION['nombre'] = $res[0]['nombre'];
                header("location: ../index.php");
              }else{
                echo "<h1>Usuario y Contraseña Incorrectas</h1>";
              }
            }else{
              include("../head.php");
              echo "<h1>Usuario No Encontrado</h1>";
              echo "<br><br>";
              echo "<a class='btn btn-primary' href='../HOSPITAL_BFR_OFICIAL/login.php'>Volver</a>";
              include("../footer.php");
            }


      break;

		}
	}


	
?>