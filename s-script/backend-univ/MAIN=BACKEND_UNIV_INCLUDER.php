<?php

	# ��� ���������� � ����������� ��� ���� ����� �������
	# ��� ���������� ��� ������, ����������� � �� ��� ���� ������, �� ��������� ��� � ������ �����
	
	
	# �������� ������ ������ ���� �������� � ����� � �����
	$debug_echo = false; # �������� �����

	
	$main_folder = "s-script/backend-univ";
	
	
	
	
	$arr_path = array(
	
		"database",
		"libs",

		"includes-class",
		"includes-all",
		#"includes-dev", �������
		#"includes-sf" �������
	
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