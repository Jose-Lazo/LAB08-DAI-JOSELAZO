<?php

    include('con_db.php');

    if (isset($_POST['register'])){

        if 
            (strlen($_POST['nombre']) >= 1 &&
            strlen($_POST['descripcion']) >= 1 &&
            strlen($_POST['pais']) >= 1 &&
            strlen($_POST['flujo']) >= 1){

                $nombre = trim($_POST['nombre']);
                $descripcion = trim($_POST['descripcion']);
                $pais = trim($_POST['pais']);
                $flujo = ($_POST['flujo']);
                $consulta = "INSERT INTO productos(nombre, descripcion, pais, flujo) VALUES ('$nombre','$descripcion','$pais','$flujo')";
                $resultado = mysqli_query($conex, $consulta);
                if ($resultado){

                    ?>

                        <script type="text/javascript">
	                        alert("¡Producto añadido exitosamente!");
	                        window.location.href='indexA.php';
                        </script>

                    <?php

                } else{

                    ?>

                        <h2 class = "bad">¡Ha ocurrido un error!</h2>

                    <?php

                }

        } else {

            ?>

                <h2 class = "bad">Por favor, complete los campos correctamente.</h2>

            <?php

        }

    }

?>