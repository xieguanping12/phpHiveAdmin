﻿<meta http-equiv="refresh" content="2">
<?php
include "templates/style.css";

if(!@$_GET['str'])
{
	die("Invalid Entry");
}
else
{
	$str = $_GET['str'];
	if(file_exists("/tmp/hive_run.".$str.".out"))
	{
		$fp = @fopen("/tmp/hive_run.".$str.".out","r");
		while(!@feof($fp))
		{
			$str .= fread($fp,128);
		}
		echo nl2br($str);
		@fclose($fp);
		
		echo "<br><br>";
	}
	else
	{
		echo "Map/Reduce is Running...plz wait a second";
	}
	echo "<a href=getResult.php?str=".$str." target=_blank>Get Result</a>";
}
?>