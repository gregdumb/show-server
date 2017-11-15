<?php

$errors = 0;

$project_dir = "../data/projects/";
$show_dir = "../data/shows/";

// Get ID
if(!empty($_GET["projectId"])) {
	$projectId = $_GET["projectId"];
	
}
else {
	$errors++;
}

// Get project
if(!empty($_POST["projectText"])) {
	$projectText = $_POST["projectText"];
	$projectFileName = $projectId . ".json";
}
else {
	$errors++;
}

// Get show
if(!empty($_POST["showText"])) {
	$showText = $_POST["showText"];
	$showFileName = $projectId . ".txt";
}
else {
	$errors++;
}

if($errors == 0) {
	
	$projectFile = fopen($project_dir . $projectFileName, 'w');//creates new file
	fwrite($projectFile, $projectText);
	fclose($projectFile);
	
	$showFile = fopen($show_dir . $showFileName, 'w');//creates new file
	fwrite($showFile, $showText);
	fclose($showFile);
	
	print("Files saved (hopefully)");
}
else {
	print("Files not saved!");
}