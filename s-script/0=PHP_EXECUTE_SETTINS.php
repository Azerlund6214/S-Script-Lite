<?php
		
		############   разобрать
		#краткое описание
		#дефолт значение (или ниже перед подр опис варианта)
		#диапазон значений(в много строк)
		#сама команда(или сразу несколько закомменченых с разными значениями(тогда без описания диапазонов))
		############

		


		
		#setlocale(LC_ALL, array("ru_RU.CP1251", "ru_SU.CP1251", "ru_RU", "russian", "ru_SU", "ru"));
		
		date_default_timezone_set("Europe/Moscow");

		########################################
			
		# Выставить output_buffering в 0
		# Проверить, выставилось ли.
		# Перед этим кодом дописать ob_implicit_flush(true);
		 	
		ob_implicit_flush(); ### Отключаем SAPI-буфер
		ob_end_flush();
		
		########################################
		
		
		###Убираем ограничение времени выполнения скрипта (дефолт = 30с)
		
		# Макс время на ЗАГРУЗКУ скрипта(DEF=30)
		#ini_set('max_execution_time', '0');
		
		#Ограничение времени выполнения скрипта
		#Макс время ВЫПОЛНЕНИЯ скрипта (DEF=30) #bool set_time_limit ( int $seconds )
		#set_time_limit(30);

		#ignore_user_abort( true ); 
		
		
		########################################
		
		#ini_set('memory_limit', '1024M');
		
		########################################
		
		#ini_set('mysql.connect_timeout','0'); 
		
		########################################
		
		# гуглануть  -  ini_set("precision", 16);
		
		########################################
		
		# ini_set('html_errors', 'on');
		# ini_set('display_errors', 1);
		 
		# error_reporting(~E_DEPRECATED); //E_ALL
		
		########################################
		
		
		/*
		Для скачки дайлов с др сайтов
		не тестил  ini_set('allow_url_fopen', 'on');
		
		php.net/manual/ru/filesystem.configuration.php#ini.allow-url-fopen
		
		*/
		

		/*
		# РАЗОБРАТЬ - страье
		
		#ini_set('extension', 'php_mbstring.dll');  // php_curl.dll
		 
		# extension=php_mbstring.dll
		# extension=php_curl.dll
		# dl("php_curl.dll");

		#if( ! extension_loaded("mbstring") )
		#	echo "<hr>mbstring не подключен";
		 
		#if( ! extension_loaded("curl") )
		#	echo "<hr>curl не подключен";
		
		*/




?>