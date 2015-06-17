<?php

require_once("../module/pheidippides.php");

$urltofetch = "http://vineyardnorthphoenix.com";
$fout = pheidippides\get($urltofetch);
echo print_r($fout, TRUE) . "\n";
