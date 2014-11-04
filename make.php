<?php
$fname = __DIR__ . "/weather.rrd";

$opts = array(
	"DS:temp_f:GAUGE:600:-20:120",
	"DS:wind_mph:GAUGE:600:0:100",
	"DS:wind_gust_mph:GAUGE:600:0:100",
	"DS:visibility_mi:GAUGE:600:0:100",
	"DS:UV:GAUGE:600:0:100",
	"DS:feelslike_f:GAUGE:600:-50:150",
	"DS:dewpoint_f:GAUGE:600:-50:150",
	"DS:precip_today_in:GAUGE:600:0:100",
	"DS:wind_degrees:GAUGE:600:0:360",
	"DS:pressure_in:GAUGE:600:0:100",
	"DS:solarradiation:GAUGE:600:0:100",
	"DS:relative_humidity:GAUGE:600:0:100",
	"RRA:AVERAGE:0.5:1:288",
	"RRA:AVERAGE:0.5:3:672",
	"RRA:AVERAGE:0.5:12:744",
	"RRA:AVERAGE:0.5:72:1480",
	"RRA:MAX:0.5:1:288",
	"RRA:MAX:0.5:3:672",
	"RRA:MAX:0.5:12:744",
	"RRA:MAX:0.5:72:1480",
	"RRA:MIN:0.5:1:288",
	"RRA:MIN:0.5:3:672",
	"RRA:MIN:0.5:12:744",
	"RRA:MIN:0.5:72:1480"
);

$ret = rrd_create($fname, $opts);

if ($ret == 0) {
	$err = rrd_error();
	echo "Create error: $err\n";
}

?>