<?php
$fname = __DIR__ . "/weather.rrd";

$ch = curl_init();
$url = "http://api.wunderground.com/api/d579e3a763d88265/conditions/q/WA/Snoqualmie.json";
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
$temp_f  = $wd->current_observation->temp_f;
$wind_mph = $wd->current_observation->wind_mph;
$wind_gust_mph = $wd->current_observation->wind_gust_mph;
$visibility_mi = $wd->current_observation->visibility_mi;
$UV = $wd->current_observation->UV;
$feelslike_f = $wd->current_observation->feelslike_f;
$dewpoint_f = $wd->current_observation->dewpoint_f;
$precip_today_in = $wd->current_observation->precip_today_in;
$wind_degrees = $wd->current_observation->wind_degrees;
$pressure_in = $wd->current_observation->pressure_in;
$solarradiation = $wd->current_observation->solarradiation;
$pattern = '/%/i';
$replacement = '';
$relative_humidity = preg_replace($pattern, $replacement, $wd->current_observation->relative_humidity);

$updatearray = array(time() . ":". $temp_f.":".$wind_mph.":".$wind_gust_mph.":".$visibility_mi.":".$UV.":".$feelslike_f.":".$dewpoint_f.":".$precip_today_in.":".$wind_degrees.":".$pressure_in.":".$solarradiation.":".$relative_humidity);
$ret = rrd_update($fname,$updatearray);

if( $ret == 0 ) {
	$err = rrd_error();
	echo "Create error: $err\n";
}
?>