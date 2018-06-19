<?php session_start();
/*if(isset($_SESSION) && isset($_SESSION['id']) && $_SESSION['id'] != ""){
}else{
  if(isset($index) && $index == 1){
    
  }else{
     header("location:/index.php");
  }
 
}*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="http://localhost/HOSPITAL_BFR_OFICIAL/">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Pelotillehue</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php
        if(isset($_SESSION) && isset($_SESSION['id']) && $_SESSION['id'] != ""){
          echo '<ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Inicio</a></li>
                  <li><a href=".php">Buscar</a></li>
                  <li><a href="formularioingresomuestras.php"> Muestra</a></li>
                  <li><a href="BackEnd/main.php?form=cantidadMuestras"> Cantidad Muestras</a></li>
                  <li><a href="BackEnd/main.php?form=cerrarsesion"> Cerrar Sesión</a></li>
                </ul>';
        }else{
          echo '<ul class="nav navbar-nav navbar-right">
              <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Iniciar Sesion</a></li>
              <li><a href="formulariousuarios.php"><span class="glyphicon glyphicon-user"></span>Registrarse</a></li>
            </ul>';
        }
      ?>
      
      
    </div>
  </div>
</nav>