<?php
$ch = curl_init();

d579e3a763d88265

$url = "http://api.wunderground.com/api//conditions/q/WA/Snoqualmie.json";
$headers = array('X-nl-protocol-version: me');
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_USERAGENT, "Hello World!");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
$wd = json_decode($response);
print $wd->current_observation->temp_f . "\n";
print $wd->current_observation->wind_mph . "\n";
print $wd->current_observation->wind_gust_mph . "\n";
print $wd->current_observation->visibility_mi . "\n";
print $wd->current_observation->UV . "\n";
print $wd->current_observation->feelslike_f . "\n";
print $wd->current_observation->dewpoint_f . "\n";
print $wd->current_observation->precip_today_in . "\n";
$pattern = '/%/i';
$replacement = '';
print preg_replace($pattern, $replacement, $wd->current_observation->relative_humidity);
?>
