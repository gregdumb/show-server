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
	
	$pid = shell_exec(sprintf('%s > /dev/null 2>&1 & echo $!', $command));
}
else {
	echo "not found";
}
?>