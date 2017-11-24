<?php

include "config.php";

error_reporting( E_ALL );

$audio = realpath($AUDIO_DIR) . "/";
$show = realpath($SHOW_DIR) . "/";

echo $audio;

$command = "python " . realpath($PY_PLAYALL) . " " . $audio . " " . $show . " 1 2>&1";

$pid = shell_exec(sprintf('%s > /dev/null 2>&1 & echo $!', $command)); // $resource = popen($command, "r");

echo $pid

?>