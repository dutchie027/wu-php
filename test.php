<?php

$fname = __DIR__ . "/weather.rrd";

$pattern = '/\:/i';
$replacement = '\\:';
$new = preg_replace($pattern, $replacement, $fname);

print $new;
?>