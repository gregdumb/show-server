<?php

include "config.php";

$errors = array();

$audio_dir = $AUDIO_DIR; //"../data/audio/";
$project_dir = $PROJECT_DIR; // "../data/projects/";
$show_dir = $SHOW_DIR; //"../data/shows/";


function addError($newError) {
	global $errors;
	$newError = $newError . "\n";
	array_push($errors, $newError);
}

# ###############################
# PROJECT NAME

// Get project name
$projectName = $_POST['projectName'];
$projectId = strtolower(preg_replace('/\s+/', '_', $projectName));

# Make sure they entered a name
if(!isset($projectName)) {
	addError("No project name");
	$projectName = "NONE";
	$projectId = "NONE";
}

if($projectId === '') {
	addError("Project id failed");
}

# ###############################
# AUDIO FILE

if(isset($_FILES["audioFile"])) {
	$audio_file = $_FILES["audioFile"]["tmp_name"];

	if(!file_exists($audio_file)) {
		addError("Audio file does not exist");
	}
	
	$audio_ext = pathinfo($_FILES["audioFile"]["name"], PATHINFO_EXTENSION);
	
	$target_audio_file = $audio_dir . $projectId . "." . $audio_ext;
}
else {
	addError("No audio file");
}

# ###############################
# PROJECT FILE
/*
if(isset($_FILES["projectFile"])) {
	$audio_file = $_FILES["projectFile"]["tmp_name"];

	if(!file_exists($audio_file)) {
		addError("Project file does not exist");
	}
	
	$project_ext = pathinfo($_FILES["projectFile"]["name"], PATHINFO_EXTENSION);
	
	$target_project_file = $project_dir . $projectId . "." . $project_ext;
}
else {
	addError("No project file");
}*/


if(!empty($_POST['projectText'])) {
	$data = $_POST['projectText'];
	$fname = $projectId . ".json";
	
	$file = fopen($project_dir . $fname, 'w');//creates new file
	fwrite($file, $data);
	fclose($file);
}


# ###############################
# PERFORM MOVING & STUFF

if(count($errors) == 0) {
	
	$audio_success = move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_audio_file);
	//$project_success = move_uploaded_file($_FILES["projectFile"]["tmp_name"], $target_project_file);
	
	//if(!$audio_success) echo "Audio failed";
	//if(!$project_success) echo "Project failed";
	
	print("Project created");
}
else {
	/*echo "The following errors were encountered:\n";
	foreach($errors as $error) {
		echo $error;
	}*/
	print("There was an error creating your project");
}

?>