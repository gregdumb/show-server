<?php

include "config.php";

$id = "";

if(!empty($_GET["id"])) {
	$id = $_GET["id"];
}

$audio = realpath($AUDIO_DIR . get_audio($id));
$show = realpath($SHOW_DIR . $id . ".txt");

if(file_exists($show)) {
	
	$command = "python " . $PY_PLAY . " " . $audio . " " . $show;
	
	echo "playing";

	System($command);
}
else {
	echo "not found";
}
?>