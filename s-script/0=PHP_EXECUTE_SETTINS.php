<?php
		
		############   ���������
		#������� ��������
		#������ �������� (��� ���� ����� ���� ���� ��������)
		#�������� ��������(� ����� �����)
		#���� �������(��� ����� ��������� ������������� � ������� ����������(����� ��� �������� ����������))
		############

		


		
		#setlocale(LC_ALL, array("ru_RU.CP1251", "ru_SU.CP1251", "ru_RU", "russian", "ru_SU", "ru"));
		
		date_default_timezone_set("Europe/Moscow");

		########################################
			
		# ��������� output_buffering � 0
		# ���������, ����������� ��.
		# ����� ���� ����� �������� ob_implicit_flush(true);
		 	
		ob_implicit_flush(); ### ��������� SAPI-�����
		ob_end_flush();
		
		########################################
		
		
		###������� ����������� ������� ���������� ������� (������ = 30�)
		
		# ���� ����� �� �������� �������(DEF=30)
		#ini_set('max_execution_time', '0');
		
		#����������� ������� ���������� �������
		#���� ����� ���������� ������� (DEF=30) #bool set_time_limit ( int $seconds )
		#set_time_limit(30);

		#ignore_user_abort( true ); 
		
		
		########################################
		
		#ini_set('memory_limit', '1024M');
		
		########################################
		
		#ini_set('mysql.connect_timeout','0'); 
		
		########################################
		
		# ���������  -  ini_set("precision", 16);
		
		########################################
		
		# ini_set('html_errors', 'on');
		# ini_set('display_errors', 1);
		 
		# error_reporting(~E_DEPRECATED); //E_ALL
		
		########################################
		
		
		/*
		��� ������ ������ � �� ������
		�� ������  ini_set('allow_url_fopen', 'on');
		
		php.net/manual/ru/filesystem.configuration.php#ini.allow-url-fopen
		
		*/
		

		/*
		# ��������� - ������
		
		#ini_set('extension', 'php_mbstring.dll');  // php_curl.dll
		 
		# extension=php_mbstring.dll
		# extension=php_curl.dll
		# dl("php_curl.dll");

		#if( ! extension_loaded("mbstring") )
		#	echo "<hr>mbstring �� ���������";
		 
		#if( ! extension_loaded("curl") )
		#	echo "<hr>curl �� ���������";
		
		*/




?>