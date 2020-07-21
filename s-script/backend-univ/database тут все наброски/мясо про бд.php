<?php

echo "Вход: в test.php <br>";

include "UNIV_PHP_CLASS_MYSQL.php";


$UN_MYSQLC   = new UNIV_PHP_MYSQL_Controller();
#$UN_SRVCONST = new UNIV_PHP_SERVER_CONST();

$UN_MYSQLC -> Server_Сonnect( "localhost" , "root" , "usbw");// or die("123");
$UN_MYSQLC -> Verify_Connect();
$UN_MYSQLC -> Select_DB("test");

$UN_MYSQLC -> Create_DB("test1");

//$arr = $UN_SMF->SMF_CONVERT_ArrArr_To_Arr( $UN_MYSQLC -> Get_List_DB_On_Server() );
//$UN_SMF->SMF_PRINTER_Print($UN_MYSQLC->Get_List_Tables_In_DB());


#$UN_MYSQLC -> Drop_DB("test1" , "DROP" );

$UN_MYSQLC -> Server_Disonnect();


//$UN_SMF->SMF_Print_Class_Func_and_Vars("UNIV_PHP_MYSQL_Controller");


exit;






	/*
	function Get_Count_Wait(  )
	{
		
		// коннект
		$connect_to_SERVER = @mysql_connect( $_POST['DB_host'] , $_POST['DB_user'] , $_POST['DB_pass'] ) or die ("<br>Ошибка подключения к серверу MySQL : №".mysql_errno()." - ".mysql_error());
		//echo "<br>Successfully connected to server ".$_POST['DB_host'];
		
		// выбор бд
		mysql_select_db( $_POST['DB_name'] ) or die ("<br>Ошибка выбора БД : №".mysql_errno()." - ".mysql_error());
	
		// sql
		$SQL = " SELECT COUNT(*) FROM ".$_POST['DB_table']." WHERE ".$_POST['DB_column']." = '". $_POST['DB_command']."' ;";
		
		//zapros
		$result = mysql_query( $SQL ) or die ("<br>$cnt Error : №".mysql_errno()." - ".mysql_error()); // правильно
		
		$COUNT = mysql_fetch_row($result)[0];
		
		
		//disconnect
		mysql_close( $connect_to_SERVER );
		
		#echo "<br>$COUNT";
		
		return $COUNT;
	}
	*/

?>