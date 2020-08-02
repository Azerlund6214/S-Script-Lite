<?php

	# Тут инклудятся и объявляются ВСЕ унив файлы бэкенда
	# Тут инклудятся все классы, контроллеры и тд для БАЗЫ ДАННЫХ, Но создаются они в другом месте
	
	
	# Выводить список файлов унив инклудов И ВЫЙТИ В КОНЦЕ
	$debug_echo = false; # Тестовый вывод

	
	$main_folder = "s-script/backend-univ";
	
	
	
	
	$arr_path = array(
	
		"database",
		"libs",

		"includes-class",
		"includes-all",
		#"includes-dev", удалено
		#"includes-sf" удалено
	
	#
	
	);
	
	
	#foreach(  glob("T*/*.php")  as   $path  )
	
	foreach(  $arr_path   as   $folder  )
	{
		#echo $folder."\n";
		foreach(  glob("$main_folder/$folder/*.php")  as   $file_path  )
		{
			require_once $file_path;
			//echo $file_path;
			
		
			if ($debug_echo) echo str_replace("/", " === ", $file_path )."   <br>\n";
			
		}
	}
	

	
	if ($debug_echo) exit("<hr>Echo end") ;
	
	unset($main_folder);
	unset($arr_path);
	unset($debug_echo);
	
	
	
	
	
?>