<?php 
	include("conexion.php");
	include("usuarios.php");
	include("tiposusuarios.php");
  include("tiposmuestras.php");
  include("estadomuestra.php");
  include("muestras.php");

	$usuarios = new usuarios();
	$tiposusuarios = new tiposusuarios();
  $tiposmuestras = new tiposmuestras();
  $estadomuestra = new estadomuestra();
  $muestras = new muestras();

	if(isset($_GET['form']))
         {
            switch ($_GET['form']) 
            {

                    case 'consultartiposusuarios':
                            include("../head.php");
                            $html = "<div class='container'>";
                            $html .= '<a href="../formulariotiposusuarios.php" class="btn btn-success">Crear Tipo Usuario</a>';
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
                            $html .= '<a href="../index.php" class="btn btn-success">Crear Usuario</a>';
                            $html .= '<table style="width:100%" class="table">
                                        <tr>
                                          <th>Id Usuario</th>
                                          <th>Rut</th> 
                                          <th>Nombre</th>
                                          <th>Dirección</th>
                                          <th>Email</th>
                                          <th>Telefono</th>
                                          <th>Tipo Usuario</th>
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
                                                              </tr>';
                                              }
                            $html .= '</table></div>';
                            echo $html;

                            include("../footer.php");
                    break;

      case 'consultartiposmuestras':
          include("../head.php");
          $html = "<div class='container'>";
          $html .= '<a href="../formulariotipomuestra.php" class="btn btn-success">Crear nuevo tipo de Muestra</a>';
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
          $html .= '<a href="../formularioestadomuestra.php" class="btn btn-success">Crear nuevo estado</a>';
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
            $html .= '<a href="../formularioingresomuestras.php" class="btn btn-success">Crear nueva muestra</a>';
            $html .= '<table style="width:100%" class="table">
                      <tr>
                    <th>Id</th>
                    <th></th> 
                  </tr>';
                  foreach ($muestras->consultar() as $key => $value) {
                    $html .=  '<tr>
                        <td>'.$value["id_Muestras"].'</td>
                        <td>'.$value["fecha_recepcion"].'</td>
                        <td>'.$value["cantidad_gramos"].'</td>
                        <td>'.$value["cantidad_cm_cubicos"].'</td>
                          <td>'.$value["TiposMuestras_id_TipoMuestra"].'</td>
                          <td>'.$value["EstadoMuestra_id_EstadoMuestra"].'</td>
                </tr>';
                  }
            $html .= '</table></div>';
            echo $html;
          
          include("../footer.php");
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
          echo  '<a href="main.php?form=consultarusuarios" class="btn btn-success">Ver Usuarios</a>';
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
                echo "<h1>Estado ingresado</h1>";
                echo  '<a href="main.php?form=consultarestado" class="btn btn-success">Ver Estado</a>';
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
                echo "<h1>Estado ingresado</h1>";
                echo  '<a href="main.php?form=consultarmuestra" class="btn btn-success">Ver Muestra</a>';
            }
            else
            {
                    "<h1>Datos no se pudieron guardar</h1>";
            }
            include("../footer.php");
      break;

		}
	}


	
?>