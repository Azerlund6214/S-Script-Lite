<?php

#251118

if (defined('PRINT_ECHO__UNIV_PHP_CLASSES'))
	echo "<br><font size=3 color=green> Объявлен класс </font> => <font color=blue>MYSQL Controller = (UNIV_PHP_MYSQL_Controller).</font>";


# Записывать в переменную "UN_MYSQLC"


# mysql_query( " USE 123");//

class UNIV_PHP_MYSQL_Controller
{
	
	public $Class_Name = "UNIV_PHP_MYSQL_Controller";
	
	### Все первые буквы слов большие
	
	public $Connection;
	public $Is_Connected = false;  # Потом вырезать и заменить на empty()
	public $Host_Name = "Connection is EMPTY";
	
	public $Current_DB;
	
	
	
	#############################################################
	
	function __construct()
	{
		if (defined('PRINT_ECHO__UNIV_PHP_CLASSES_CONSTRUCT'))
			echo "<br> Создан класс ".$this->Class_Name; 
	}
	
	function __destruct() 
	{	
		if (defined('PRINT_ECHO__UNIV_PHP_CLASSES_DESTRUCT'))
			echo "<br> Уничтожается класс ".$this->Class_Name ;
	}
	
	#############################################################
	### ВСЕ про коннект к серверу
	
	### описать
	###
	function Server_Сonnect( $Host , $User , $Pass )
	{
		# Не проверяю параметры
		
		
		# TODO: Если Is_Conected, то сделать дисконнект
		
		
		$this -> Connection = @mysql_connect( $Host , $User , $Pass );
		
		if ( empty($this -> Connection) )			
		{
			echo "<br><font color=red>Ошибка подключения к серверу MySQL </font>: №".mysql_errno()." - ".mysql_error();			
			return false;
		}
		
		echo "<br><font color=green> Successfully connected to server </font>".$Host;
		
		$this -> Host_Name = $Host;
		$this -> Is_Connected = true;
		
		return true;
	}


	// Закрывает текущее соединение, хранящееся в поле (РАБОТАЕТ)
	# Переписать тексты ошибок(УБРАТЬ ИХ ВОБЩЕ)
	### Return: true = Отключились или уже был отключен
	###         false = Не получилось
	function Server_Disonnect()
	{
		switch( $this -> Is_Connected )
		{
			case true:
						if( mysql_close( $this -> Connection) )
						{
							echo "<br><font color=green> Отключились от сервера </font>".$this -> Host_Name;
							$this -> Is_Connected = false;
							$this -> Host_Name = "Connection is EMPTY";
							return true;
						}
						else
						{
							echo "<br><font color=red> Не удалось отключится от сервера </font>".$this -> Host_Name;
							return false;
						}
			
			case false:
						echo "<br><font color=blue> Еще не подключен к этому хосту(ни разу): </font>".$this -> Host_Name;
						$this -> Host_Name = "Connection is EMPTY";
						return true;
			
			default:   # Недостижимо
						return false;
		}
		
	}
	
	
	# Живо ли подключение
	### true = серв доступен
	### false = серв не доступен/потерян
	function Verify_Connect()
	{

		$ping = mysql_ping( $this -> Connection );
		// Можно убрать = в условие свитча
		if( ! $ping ) 
		{
			echo "<br><font color=red>Соединения с сервером MySQL ПОТЕРЯНО: </font>".$this -> Host_Name;
			$this -> Is_Connected = false;
			#$this -> Host_Name = "Connection LOST";
			return false;
		}
		else
		{
			echo "<br><font color=green>Соединение активно: Пинг = $ping, </font>".$this -> Host_Name;
			return true;
		}

	
	
	}
	
	
	#############################################################
	### Все про БД
	
	### true = норм
	### false = ошибка
	function Select_DB( $DB_Name )
	{
		
		if( mysql_select_db($DB_Name) )
		{
			echo "<br><font color=green>Подключился к БД: </font>".$DB_Name;
			$this -> CurrentDB = $DB_Name;
			return true;
		}
		else
		{
			echo "<br><font color=red>Ошибка выбора БД($DB_Name) </font>: №".mysql_errno()." - ".mysql_error();
			return false;
		}
	}
	
	
	
	
	#############################################################
	### Запросы (Главная функция)

	# return false;   // Ошибка в запросе
	# return "EMPTY";   // Результат запроса пуст (ничего не нашлось)(А ожидалось)
	### return [строка][номер столбца];     // Все норм 
	function Execute_SQL_Arr( $SQL , $Echo_Error = true , $Echo_Empty = true)
	{	
		$result = mysql_query( $SQL );//

		
		if ( mysql_error() )
		{			
			if( $Echo_Error )
			{
				echo "<br><br>ОШИБКА в " , __FUNCTION__ , "().";
				echo "<br>Функция-инициатор 1: ".debug_backtrace()[1]["function"];
				echo "<br>Функция-инициатор 2: ".@debug_backtrace()[2]["function"]; ### СДЕЛАТЬ ОТДЕЛЬНЫЙ МЕТОД   (поиграть с [function])
				echo "<br>SQL = ### $SQL ###";
				echo "<br>Ошибка №" . mysql_errno() . " - " . mysql_error() ;
			}
			return false;
		}
		
		
		
		$ret_arr_rows = array();
		
		while( $rows = @mysql_fetch_row($result) )
			$ret_arr_rows[] = $rows;
		
		
		# DEL =    if ( @$ret_arr_rows[0] === null ) //лучше !empty($ddd) ### Не пришло ни одной строки
		
		if ( @empty($ret_arr_rows) ) ### Не пришло ни одной строки( А должно было)
		{
			if( $Echo_Empty )
			{
				echo "<br><br>ПУСТОЙ результат запроса в " , __FUNCTION__ , "().";
				echo "<br>Функция-инициатор 1: ".debug_backtrace()[1]["function"];
				echo "<br>Функция-инициатор 2: ".@debug_backtrace()[2]["function"];
				echo "<br>SQL = ### $SQL ###";
			}
			return "EMPTY";
		}
		
		return $ret_arr_rows;
	
	}

	
	# return false; // Ошибка в запросе
	# return true   // Прошел
	function Execute_SQL_Bool( $SQL , $Echo_Error = true )
	{
		mysql_query( $SQL );//

		if ( mysql_error() )
		{			
			if( $Echo_Error )
			{
				echo "<br><br>ОШИБКА в " , __FUNCTION__ , "().";
				echo "<br>Функция-инициатор 1: ".debug_backtrace()[1]["function"];
				echo "<br>Функция-инициатор 2: ".@debug_backtrace()[2]["function"]; ### СДЕЛАТЬ ОТДЕЛЬНЫЙ МЕТОД   (поиграть с [function])
				echo "<br>SQL = ### $SQL ###";
				echo "<br>Ошибка №" . mysql_errno() . " - " . mysql_error() ;
			}
			return false;
		}
		
		return true;
	
	}
	
	#############################################################
	### Запросы ТЯЖЕЛЫЕ (Действия)
	
	# труфы
	
	# return false; // Ошибка в запросе
	# return true   // Прошел
	function Create_DB( $DB_Name )
	{
		if( $this->Execute_SQL_Bool( "CREATE DATABASE $DB_Name ; " ) )
		{
			echo "<br><font color=green>Создана БД: </font>".$DB_Name;
			return true;
		}	
		
		# Ошибку покажет исполнитель запроса
		echo "<br><font color=red>БД НЕ Создана: </font>".$DB_Name;
		return false;
	}
	
	# return false; // Ошибка в запросе
	# return true   // Прошел
	function Drop_DB( $DB_Name , $Secure="DROP = Защита")
	{
	
		//Не отловит если будут пробелы, а sql все равно исполнится(ибо ему на пробелы пофиг)
		$Blocked = array("information_schema","mysql","performance_schema");
		if( in_array($DB_Name , $Blocked ) )
			return false;
			
	
		if( $Secure != "DROP" )
		{
			echo "<br><font color=red>Неверное защитное слово => БД НЕ Удалена: </font>".$DB_Name;
			return false;
		}
	
		if( $this->Execute_SQL_Bool( "DROP DATABASE $DB_Name ; " ) )
		{
			echo "<br><font color=green>Удалена БД: </font>".$DB_Name;
			return true;
		}	
		
		# Ошибку покажет исполнитель запроса
		echo "<br><font color=red>БД НЕ Удалена: </font>".$DB_Name;
		return false;
	}
	
	
	# ПОКА НЕ НАПИСАНА
	# return false; // Ошибка в запросе
	# return true   // Прошел
	function NOT_WRITED____Rename_DB( $Old_Name , $New_Name )
	{	
		return false;
		#начиная с версии 5,1,17 можно использовать команду:
		#RENAME DATABASE old_db to new_db;

		//database video  rename   tr_video
		// НЕ РОБИТ  =  if( $this->Execute_SQL_Bool( "DATABASE \"$Old_Name\" RENAME \"$New_Name\" ; " ) )
		// НЕ РОБИТ  =  if( $this->Execute_SQL_Bool( "RENAME DATABASE \"$Old_Name\" TO \"$New_Name\" ; " ) )
		if( $this->Execute_SQL_Bool( "RENAME DATABASE '$Old_Name' TO '$New_Name' ; " ) ) // НЕ РОБИТ
		{
			echo "<br><font color=green>Переименована БД: $Old_Name => $New_Name</font>";
			return true;
		}	
		
		# Ошибку покажет исполнитель запроса
		echo "<br><font color=red>БД НЕ Переименована: $Old_Name => $New_Name </font>";
		return false;
	
	}
	
	
	
	#############################################################
	### Запросы ЛЕГКИЕ (Заготовки)
	
	
	
	# РОБИТ
	# Список всех БД на сервере
	# return []  ERROR  EMPTY
	function Get_List_DB_On_Server()
	{
		$result = $this->Execute_SQL_Arr( "SHOW DATABASES ; " );
		
		switch( $result )
		{
			case "ERROR":
							echo "<br><font color=red>Ошибка: </font>";
							return $result;
							
			case "EMPTY":
							echo "<br><font color=blue>Нет ни одной БД на сервере: </font>";
							return $result;
							
			default:	
						echo "<br><font color=green>БД Есть: </font>";
						$NewArr = array();
						foreach($result as $a) //Копипаст из SMF
							$NewArr[] = $a[0];
						
						return $NewArr ;
		
		
		}
		
	}
	
	# РОБИТ
	# Список таблиц в БД
	# return []  ERROR  EMPTY
	function Get_List_Tables_In_DB( $DB_Name="mysql" )
	{
		$result = $this->Execute_SQL_Arr( "SHOW TABLES FROM $DB_Name ; " );
		
		switch( $result )
		{
			case "ERROR":
							echo "<br><font color=red>Ошибка: </font>";
							return $result;
							
			case "EMPTY":
							echo "<br><font color=blue>Нет ни одной таблицы в БД: $DB_Name</font>";
							return $result;
							
			default:	
						echo "<br><font color=green>Талица в БД Есть: $DB_Name</font>";
						
						$NewArr = array();
						foreach($result as $a) //Копипаст из SMF
							$NewArr[] = $a[0];
						
						return $NewArr ;	
						
		
		}
	
	}
	
	
	
	#function Get_List_Columns_In_Tables( $DB_Name="mysql" , Table_Name = "123" )
	#{}
	/*
	    $result = mysql_query("SHOW COLUMNS FROM $DB_table");
		$fields = array();
	
	
	if( $SELECT === "*")
		while ($row = mysql_fetch_assoc($result)) 
			$fields[] = $row['Field'];
	else
		$fields = explode( "," , "$SELECT") ;
	*/
	
	#############################################################
	
	### if ( is_string($RESULT) )
	
	/*
	SHOW DATABASES; - список баз данных
	SHOW TABLES [FROM db_name]; -  список таблиц в базе 
	SHOW COLUMNS FROM таблица [FROM db_name]; - список столбцов в таблице
	SHOW CREATE TABLE table_name; - показать структуру таблицы в формате "CREATE TABLE"
	SHOW INDEX FROM tbl_name; - список индексов
	SHOW GRANTS FOR user [FROM db_name]; - привилегии для пользователя.

	SHOW VARIABLES; - значения системных переменных
	SHOW [FULL] PROCESSLIST; - статистика по mysqld процессам
	SHOW STATUS; - общая статистика
	SHOW TABLE STATUS [FROM db_name]; - статистика по всем таблицам в базе
	*/
	
	
	
	
	
}#END CLASS





?>