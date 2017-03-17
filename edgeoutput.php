<?php
require_once("../../config.php");
require_once("gephilib.php");
$newid= $_POST['Gephi_Data'];
$arr = gephi_show_course_dots($newid);
$name = gephi_show_dot_name($arr);
$label = array("Source","Target");
$names = array();
$names[]= $label;
for($i=0;$i<count($name);$i++)
{
	$names[]=$name[$i];
	}

//$file = fopen("contacts.csv","w");
    header('Content-Type: application/vnd.ms-excel');  
    header('Content-Disposition: attachment;filename="gephi_egdes_data.csv"');  
    header('Cache-Control: max-age=0');
for($i=0;$i<count($names);$i++)
{
	for($j=0;$j<count($names[$i]);$j++)
	{
		echo $names[$i][$j];
		echo ",";
		}
	echo "\r\n";
	}
	
