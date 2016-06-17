<?php
$time=intval($_REQUEST["time"]);
usleep($time*1000);
echo done;
?>