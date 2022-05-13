<?php
  
  $consulta=ConsultarProducto($_GET['id']);

  function ConsultarProducto($id_prod)
  {

    include("con_db.php");
    include("regresar_reg_prod.php");
    $sentencia="SELECT * FROM productos WHERE id='".$id_prod."' ";
    $resultado=$conex->query($sentencia);
    $filas = $resultado->fetch_assoc();

    return [
      $filas['nombre'],
      $filas['descripcion'],
      $filas['pais'],
      $filas['flujo']
    ];

  }


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar producto</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="todo">

  <div id="contenido">
    
    <h1 class="text-center">Modificar producto</h1>

  	<div id="contenido">
  		
  		<br>
      <form action="modif_prod2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?> ">

        <table style="margin: auto; width: 800px; border-collapse;" class = "table table-striped">
          
          <tr>
            <td><h3>Nombre: </h3></td>
            <td><input type="text" id="nombre" name="nombre"; value="<?php echo $consulta[0] ?>" ></td>
            <td class="text-center" rowspan = "6"><button name="guardar" class="btn btn-success"> <img src="img/save.jpg" alt=""></button></td>
          </tr>
          
          <tr>
            <td><h3>Descripcion: </h3></td>
            <td><input type="text" id="descripcion" name="descripcion" value="<?php echo $consulta[1] ?>"></td>
          </tr>

          <tr>
            <td><h3>Pais: </h3></td>
            <td><input type="text" id="pais" name="pais" value="<?php echo $consulta[2] ?>"></td>
          </tr>

          <tr>
            <td><h3>Flujo: </h3></td>
            <td><input type="text" id="flujo" name="flujo" value="<?php echo $consulta[3] ?>"></td>
          </tr>
          
        </table>
      </form>
  	</div>
  	
  </div>

</div>


</body>
</html>