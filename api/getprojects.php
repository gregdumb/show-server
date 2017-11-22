<?php

include "config.php";

$project_array = array();

$project_paths = glob($PROJECT_DIR . "*.json", GLOB_BRACE);

foreach ($project_paths as $path) {
	
	//$contents = file_get_contents($path);
	
	$project = basename($path, ".json");
	$project = "\"" . $project . "\"";
	
	array_push($project_array, $project);
}

$return_string = "[".implode(",", $project_array)."]";

print($return_string);

?>