<?php

include "s-script/backend/0=PHP_EXECUTE_SETTINS.php";


foreach(  glob("s-script/backend/my_classes/*.php")  as   $file_path  )
{
	require_once $file_path;		
	#echo str_replace("/", " === ", $file_path )."   <br>\n";
}

//exit("123");
	


?>