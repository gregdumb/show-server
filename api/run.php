<?php

include "config.php";

/***
Possible commands:
- stop
- sparkle
- !playall
- !play id=your_show
***/

$cmd = "";
$id = "";

$command = "";

if(!empty($_GET["cmd"])) {
	$cmd = $_GET["cmd"];
}

if($cmd == "sparkle") {
	echo "Doing sparkle";
	$command = "python " . realpath($PY_SPARKLE);
}
else if($cmd == "stop") {
	echo "Stopping";
	$command = "python " . realpath($PY_STOP);
}

else {
	echo "Unknown command '" . $cmd . "'";
}

// Execute command
if($command != "") {
	$pid = shell_exec(sprintf('%s > /dev/null 2>&1 & echo $!', $command));
}

?>