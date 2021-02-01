<?php

	session_start();
	unset($SESSION['cedula']);
	session_destroy();

	header('Location: index.php');

?>