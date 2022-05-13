<?php
        include("registrar_prod.php")
?>

<?php
        include("regresar_reg_prod.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
    <link rel="stylesheet" type = "text/css" href="css/estilo.css">
</head>
<body>

    <form action="reg_prod.php" method="post">

        <h1>Registra un producto</h1>
        <input type="text" name = "nombre" placeholder = "Nombre">
        <input type="text" name = "descripcion" placeholder = "Descripcion">
        <input type="text" name = "pais" placeholder = "Pais">
        <input type="text" name = "flujo" placeholder = "Flujo">
        <input type="submit" name = "register">
        <br><br>
        <button name = "regresar">Regresar</button>
        
    </form>
    
</body>
</html>