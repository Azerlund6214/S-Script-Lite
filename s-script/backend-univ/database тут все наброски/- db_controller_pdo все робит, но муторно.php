<?php


$dbms = "mysql";
$host = 'localhost';
$db   = '';
$charset = 'utf8';
$port = "";

$user = 'root';
$pass = 'pass';

$DBC = new DB_Controller();
$DBC -> Connect_prepare( $dbms , $host , $db , $charset , $port );
$DBC -> Connect( $user , $pass );

$DBC -> Select_db("vk_monitor");

//$DBC -> pdo -> exec("INSERT INTO test(number) VALUES(123)");
$data = $DBC -> Query("INSERT INTO test(number) VALUES(123)");

//$data = $DBC -> Query("SELECT text FROM test WHERE id=10");
//$data = $DBC -> Query("SELECT * FROM test");

=========================


	class DB_Controller
	{

		public $pdo; # Главное подключение к бд
		public $connection_string; # Строка настроек подключения.
		
		
		public $is_connected = false;
		
		####################################
		
		// Функ возвращающая подключение (ссылкой)
		
		
		
		public function __construct()
		{	//exit("123");
		}
		
		# Сборка строки подключения
		public function Connect_prepare( $dbms , $host , $db = "" , $charset = "" , $port = "")
		{
			$dsn = "$dbms:host=$host";
			
			if ( $db != "")      $dsn .= ";dbname=$db";
			if ( $charset != "") $dsn .= ";charset=$charset";
			if ( $port != "")    $dsn .= ";port=$port";
			
			$this -> connection_string = $dsn;	
		}
		
		# Создание подключения
		public function Connect( &$user , &$pass , $unset = true )
		{
			
			$opt = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
			];

			try
			{
				$connection = new PDO($this->connection_string, $user, $pass, $opt);
			}
			catch (PDOException $e)
			{
				echo 'Подключение не удалось: ' . $e->getMessage();
				exit;
			}
			
			$this -> pdo = $connection;
			$this -> is_connected = true;
			
			
			if ( $unset )
				unset( $user, $pass );
			
			return true;
		}
		
		
		public function Query( $sql )
		{
			return $this->pdo -> query( $sql)->fetchAll();
		}
		
		// prepare писать прямо в коде
		
		
		#Выполняет SQL-запрос и возвращает количество затронутых строк
		public function Exec( $sql )
		{
			
			$this->pdo ->exec( $sql );			
			
		}
		
		
		// робит
		public function Select_db( $target_db )
		{
			$this->pdo -> exec("USE $target_db");
		}
		
		
		# Проверка работоспособности.
		function test_conn()
		{

			foreach ($this->pdo -> query('SELECT VERSION()') as $row)
				print_r($row);
			
			exit;
		
		}
		
		
		
		
		

	} # End class
	
?>