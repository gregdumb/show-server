<?php

include "config.php";

$id = "";

if(!empty($_GET["id"])) {
	$id = $_GET["id"];
}

$audio = realpath($AUDIO_DIR . get_audio($id));
$show = realpath($SHOW_DIR . $id . ".txt");

if(file_exists($show)) {
	
	$command = "python " . realpath($PY_PLAY) . " " . $audio . " " . $show;
	
	$resource = popen($command, "r"); //"python ../show-player/test.py 2>&1", "r");
	
	$read = fread($resource, 2096);
	echo $read;
	pclose($resource);
}
else {
	echo "not found";
}
?>