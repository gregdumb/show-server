<?php

$project_array = array();

$project_paths = glob("../data/projects/*.json", GLOB_BRACE);

foreach ($project_paths as $path) {
	
	//$contents = file_get_contents($path);
	
	$project = basename($path, ".json");
	$project = "\"" . $project . "\"";
	
	array_push($project_array, $project);
}

$return_string = "[".implode(",", $project_array)."]";

print($return_string);

?>