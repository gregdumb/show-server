<?php

$PLAYER_DIR = ("../show-player/");

$DATA_DIR = ("../data/");
$AUDIO_DIR = ("../data/audio/");
$PROJECT_DIR = ("../data/projects/");
$SHOW_DIR = ("../data/shows/");

// Python scripts
$PY_PLAY = "../show-player/playshow.py";


function get_audio($project_id) {
	
	$match = "../data/audio/" . $project_id . ".*";
	
	$audio_paths = glob($match, GLOB_BRACE);
	
	if(count($audio_paths) > 0) {
		
		$path = basename($audio_paths[0]);
		return ($path);
	}
	else {
		return "";
	}
}

?>