<?php
	
	include("bootstrap.php");
	
	use library\mysqli as mysql;
	$database = new mysql\database();
	
	$database->newConnection(
		array("host", "username", "password", "database")
	);
	
	
	
	