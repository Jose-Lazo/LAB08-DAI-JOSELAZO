<?php
	
	EliminarProducto($_GET['id']);

	function EliminarProducto($id)
	{
		include('con_db.php');
		$sentencia="DELETE FROM productos WHERE id='".$id."' ";
		$resultado=$conex->query($sentencia);
	}
?>

<script type="text/javascript">
	alert("¡Producto eliminado exitosamente!");
	window.location.href='indexA.php';
</script>