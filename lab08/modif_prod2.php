<?php
	
    ModificarProducto($_POST['nombre'], $_POST['descripcion'], $_POST['pais'], $_POST['flujo'], $_POST['id']);

	function ModificarProducto($nombre, $descripcion, $pais, $flujo, $id)
	{
        include("con_db.php");
		$sentencia="UPDATE productos SET nombre= '".$nombre."', descripcion='".$descripcion."', pais= '".$pais."', flujo='".$flujo."' WHERE Id='".$id."' ";
		
        $resultado=$conex->query($sentencia);
	}
?>

<script type="text/javascript">
	alert("¡Producto modificado exitosamente!");
	window.location.href='indexA.php';
</script>