<?php

include "config.php";

echo "stopping";

$str = "python " . $PLAYER_DIR . "stopall.py";

System($str);

?>