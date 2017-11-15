<?php

$id = $_GET["id"];
$match = "../data/audio/" . $id . ".*";

$audio_paths = glob($match, GLOB_BRACE);

if(count($audio_paths) > 0) {
	
	$path = basename($audio_paths[0]);
	print($path);
}

?>