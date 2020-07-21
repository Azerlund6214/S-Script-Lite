<?php


	 $use_curl = true;
	 $use_https = false;//дописать
	 $del_db = 0; //удалять ли старую бд?
	 // ...
	 $DB_name = "mybase";//имя файла бд
	 $DB_host = "127.0.0.1";     //адрес бд 
	 $DB_user = "root";		//все принимать из формы
	 $DB_pass = "6279893664";
	
	
//               *** Подготовка бд ***
	
	
	 //Подключаемся 1 раз на весь сеанс
	 $link = @mysql_connect($DB_host, $DB_user, $DB_pass) or die ("<br>Ошибка подключения к серверу MySQL : №".mysql_errno()." - ".mysql_error());
	 echo "<br>Successfully connected to server ".$DB_host;
	 
	 
	 //ФУЛЛ ГОТОВО
	if($del_db == true)
	{
		mysql_query("DROP DATABASE ".$DB_name)   or die ("<br>Error deleting database : №".mysql_errno()." - ".mysql_error()); //
		echo "<br><font color = 'red' size = 3 >База данных по имени ".$DB_name." удалена</font>";
				
		mysql_query("CREATE DATABASE ".$DB_name) or die ("<br>Error creating database : №".mysql_errno()." - ".mysql_error()); // правильно
		echo "<br>Успешно создана база данных с именем ".$DB_name;
			
		//Обязательно (иначе вылет на создании таблиц)
		mysql_select_db($DB_name) or die ("<br>Ошибка выбора БД : №".mysql_errno()." - ".mysql_error());
		echo "<br>Успешно выбрана новая БД ".$DB_name;	
			
		$create_1_table = "
			CREATE TABLE `url_new` (
				`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
					`url_n` varchar(255) NOT NULL UNIQUE,
						PRIMARY KEY (`url_n`)   );";			
		$create_2_table = "
			CREATE TABLE `url_checked` (
				`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
					`time_add` DATETIME NOT NULL,
						`url_c` varchar(255) NOT NULL UNIQUE,
							`author` varchar(64),
								`date_publ` VARCHAR(32),
									`text` TEXT (65535) NOT NULL ,  
										PRIMARY KEY (`url_c`)   );";  //убрал у TEXT(65535) параметр UNIQUE т к ругался
		$create_3_table = "
			CREATE TABLE `url_bad` (
				`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
					`url_b` varchar(255) NOT NULL UNIQUE,
						PRIMARY KEY (`url_b`)   );";
		$create_4_table = "
			CREATE TABLE `logs` (
				`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
					`date_add` DATETIME NOT NULL,
						`reason` varchar(32),
							`message` VARCHAR(128),
								PRIMARY KEY (`id`)   );";

		mysql_query( $create_1_table ) or die ("<br>Error creating table 1 : №".mysql_errno()." - ".mysql_error());
		mysql_query( $create_2_table ) or die ("<br>Error creating table 2 : №".mysql_errno()." - ".mysql_error());
		mysql_query( $create_3_table ) or die ("<br>Error creating table 3 : №".mysql_errno()." - ".mysql_error());
		mysql_query( $create_4_table ) or die ("<br>Error creating table 4 : №".mysql_errno()." - ".mysql_error());	
	}
	else
	{
		mysql_select_db($DB_name) or die ("<br>Ошибка выбора БД : №".mysql_errno()." - ".mysql_error());
		echo "<br>Успешно выбрана уже существующая БД ".$DB_name;
	}

	echo "<hr><br>";


	
		
		
		
	 
?>