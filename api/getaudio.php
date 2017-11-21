<?php

include "config.php";

if(!empty($_GET["id"])) {
	$id = $_GET["id"];
	
	echo get_audio($id);
}

?>