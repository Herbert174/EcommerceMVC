<?php

	require_once('db.class.php');

	$objDb = new database();
	$link = $objDb -> conecta_mysql();

	$id = $_GET['id_produto'];

	if($id)
		{
		$sql = " DELETE FROM produtos WHERE id_produto = '$id' ";
		mysqli_query($link, $sql);
		}

	

?>