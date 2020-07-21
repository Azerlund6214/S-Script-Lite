<?php

# Инклудится в идексе и во всех аяксах


# Если в backend-include будет файл с UTF8-BOM, то напишет, что что сессия уже началась (тк вывелись бомовские символы)
session_start();

if (!isset( $_SESSION["logged_user"] ) )
	$_SESSION["logged_user"] = false;  # Просто создаю поле если его нет

# ДОПИСАТЬ

##############



# Объявление данных для подключения к БД
# Константы базы данных


$host = '127.0.0.1';
$user = 'root';
$pass = 'pass';


//$DBC = new DB_Controller();
//$DBC -> Connect( $host, $user , $pass );
//$DBC -> Get_error();

//$data = $DBC -> test_conn();
//echo "<pre>"; print_r($data); echo "</pre>"; exit("12134");















?>