<?php

$rrdname = __DIR__ . "/weather.rrd";

$pattern = '/\:/i';
$replacement = '\\:';
$fname = preg_replace($pattern, $replacement, $rrdname);

$pngout = __DIR__ . "/nest.png";

$opts = array(
	"--title","Nest Weekly Statistics",
	"--end","now",
	"--start","end-3d",
	"--width","400",
	"--watermark", "(c) Justin Rodino",
	"DEF:outtemp=$fname:outtemp:AVERAGE",
	"DEF:intemp=$fname:intemp:AVERAGE",
	"DEF:outhumid=$fname:outhumid:AVERAGE",
	"DEF:inhumid=$fname:inhumid:AVERAGE",
	"DEF:batlevel=$fname:batlevel:AVERAGE",
	"DEF:acon=$fname:acon:AVERAGE",
	"DEF:heaton=$fname:heaton:AVERAGE",
	"DEF:leafon=$fname:leafon:AVERAGE",


	"AREA:intemp#cc7016:Inside Temp",
	"LINE1:outtemp#00cc66:Outside Temp",
	"LINE1:outhumid#b415c7:Outside Humid",
	"LINE1:inhumid#ADFF2F:Inside Humid",
	"COMMENT:\\s",
	"COMMENT:\\n",
	"COMMENT:\\s",
	"COMMENT:\\n",
	"COMMENT:\\s",
	"COMMENT:\\n",
	"COMMENT:\\s",
	"COMMENT:\\n",

	"GPRINT:outtemp:MIN:Min Outside Temp\: %2.1lf F",
	"GPRINT:intemp:MIN:Min Inside Temp\: %2.1lf F",
	"GPRINT:outtemp:MAX:Max Outside Temp\: %2.1lf F",
	"GPRINT:intemp:MAX:Max Inside Temp\: %2.1lf F",
	"GPRINT:outtemp:AVERAGE:Avg Outside Temp\: %2.1lf F",
	"GPRINT:intemp:AVERAGE:Avg Inside Temp\: %2.1lf F",
	"GPRINT:outtemp:LAST:Last Outside Temp\: %2.1lf F",
	"GPRINT:intemp:LAST:Last Inside Temp\: %2.1lf F\\j",
	"COMMENT: \\n",
	"GPRINT:acon:LAST:AC On\: %1.0lf",
	"GPRINT:heaton:LAST:Heat On\: %1.0lf",
	"GPRINT:leafon:LAST:Leaf\: %1.0lf\\j",
	"TEXTALIGN:center",
	"GPRINT:batlevel:LAST:Battery Level\: %2.2lf",
	"--color","BACK#CCCCCC",
	"--color","CANVAS#6C9BCD",
	"--color","SHADEB#666666",
	"--font", "TITLE:16:Segoe UI Light"   

  );

 /*
	"--x-grid", "MINUTE:10:HOUR:1:HOUR:4:0:%X",
	"--font", "AXIS:7:Segoe UI Light",   
	"--font", "LEGEND:9:Segoe UI Light",   
	"--font", "UNIT:7:Segoe UI Light",   
	"--font", "WATERMARK:7:Segoe UI Light"
	"CDEF:input=outtemp,8,*",
	"CDEF:shading15=input,0.85,*",
	"CDEF:shading30=input,0.70,*",
	"CDEF:shading45=input,0.55,*",
	"CDEF:shading60=input,0.40,*",
	"CDEF:shading75=input,0.25,*",
	"AREA:shading15#00bF00",
	"AREA:shading30#00cF00",
	"AREA:shading45#00dF00",
	"AREA:shading60#00eF00",
	"AREA:shading75#00fF00",

	"--color", "BACK#000000",
	"--color", "SHADEA#000000",
	"--color", "SHADEB#000000",
	"--color", "FONT#DDDDDD",
	"--color", "CANVAS#202020",
	"--color", "GRID#666666",
	"--color", "MGRID#AAAAAA",
	"--color", "FRAME#202020",
	"--color", "ARROW#FFFFFF",
*/
  
$ret = rrd_graph($pngout, $opts);

if ($ret == 0) {
	$err = rrd_error();
	echo "Create error: $err\n";
}

?>