<?php

	НАБРОСОК
	
	require_once("constants.php");
	require_once("db_controller.php");
	
	
	
	ПЕРЕПИСАТЬ ЭТО НА КЛАСС
	$con = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die("Cannot select DB");
	
	
	#DB Controller
	$DBC = класс
	
	##############################
	##### Подкл класов логики
	
	# хз   не лучше ли их подключать и создавать прямо на месте где это нужно (вопрос безопасности)
	
	# Шаблон
	#DB Logic Main
	require_once("db_logic_main.php");
	$DBLM = созд класса(параметр = $DBC)
	
	
	
	$DBL_что

	
?>