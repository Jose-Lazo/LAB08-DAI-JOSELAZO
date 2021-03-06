<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['admin_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM admin WHERE id = :id');
    $records->bindParam(':id', $_SESSION['admin_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $admin = null;

    if (count($results) > 0) {
      $admin = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>¬°Bienvenido!</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($admin)): ?>
      
      <div class="todo">

        <nav class="navbar fixed-top navbar-expand-lg navbar-expand-md navbar-light bg-dark p-md-3">
            <div class="container-fluid">
              <a class="navbar-brand" href="#" style="color:white">¬°Bienvenido, <?= $admin['email']; ?>!</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  
                  
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                  <button class="btn btn-outline-light" type="submit">Buscar</button>
                  <a class="nav-link active" aria-current="page" style="color:rgba(42, 42, 46, 0)">      </a>
                </form>
                <a href="logoutA.php"><button class="btn btn-outline-light" type="submit">Cerrar sesi√≥n</button></a>
              </div>
            </div>
          </nav>

          <br>

        <h1 class="text-center">Lista de produstos</h1>
        <br>
        
        <div id="contenido">
          <table style="margin: auto; width: 800px; border-collapse;" class = "table table-striped">
            <thead>
              <th><center>Id</center></th>
              <th><center>Nombre</center></th>
              <th><center>Descripci√≥n</center></th>
              <th><center>Pa√≠s</center></th>
              <th><center>Flujo</center></th>
              <th colspan="3" class="text-center"> <a href="reg_prod.php"> <button type="button" class="btn btn-info">Registrar producto</button> </a> </th>
            </thead>
            <tbody>
              <?php
              include("con_db.php");
              $sentencia="SELECT * FROM productos";
              $resultado=$conex->query($sentencia);
              while($filas = $resultado->fetch_assoc())
              {
                
                echo "<tr>";
                  echo "<td>"; echo $filas['id']; echo "</td>";
                  echo "<td>"; echo $filas['nombre']; echo "</td>";
                  echo "<td>"; echo $filas['descripcion']; echo "</td>";
                  echo "<td>"; echo $filas['pais']; echo "</td>";
                  echo "<td>"; echo $filas['flujo']; echo "</td>";
                  echo "<td>  <a href='modif_prod.php?id=".$filas['id']."'> <button type='button' class='btn btn-success editbtn'>Modificar</button> </a> </td>";
                  echo "<td> <a href='eliminar_prod.php?id=".$filas["id"]."''><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
                echo "</tr>";
              }

              ?>
            </tbody>
          </table>

          <br>
        </div>

      </div>
    <?php else: ?>
      <h1>Por favor, registrate o inicia sesi√≥n.</h1>

      <a href="loginA.php">Iniciar sesi√≥n</a> o
      <a href="signupA.php">Registrarse</a>
    <?php endif; ?>
  </body>
</html>
