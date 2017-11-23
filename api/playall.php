<?php

include "config.php";

$audio = realpath($AUDIO_DIR) . "/";
$show = realpath($SHOW_DIR) . "/";

echo $audio;

$command = "python " . realpath($PY_PLAYALL) . " " . $audio . " " . $show . " 0";

$resource = popen($command, "r");

$read = fread($resource, 2096);
echo $read;
pclose($resource);

?>