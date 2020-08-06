<?php

# Этот файл подключается во всех аяксах


include $_SERVER['DOCUMENT_ROOT']."/s-script/backend/0=PHP_EXECUTE_SETTINS.php";


foreach(  glob($_SERVER['DOCUMENT_ROOT']."/s-script/backend/my_classes/*.php")  as   $file_path  )
{
	require_once $file_path;		
	#echo str_replace("/", " === ", $file_path )."   <br>\n";
}

//exit("123");
	


?>