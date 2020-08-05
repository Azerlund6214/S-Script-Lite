<?php
		
		
		echo "<br><font size=3 color=MediumVioletRed> Объявлен класс </font> => <font color=blue>SERVER CONST.</font>";

		
		
		
		
		########################################
		

		


		
		
		
# Записывать в переменную "UN_SRVCONST"


class UNIV_PHP_SERVER_CONST
{
	
	public $Class_Name = "UNIV_PHP_SERVER_CONST";
	
	
	#############################################################
	
	function __construct()
	{
		echo "<br> Создан класс ".$this->Class_Name; 
	}
	
	function __destruct() 
	{	
		echo "<br> Уничтожается класс ".$this->Class_Name ;
	}
	
	#############################################################
	

	
	#############################################################
	
	
	#############################################################
	
	
	#############################################################
	
	
	
}#END CLASS



/*
	echo "<br>server ip = ".$_SERVER['SERVER_ADDR'];
	echo "<br>server name = ".$_SERVER['SERVER_NAME'];
	echo "<br>server id = ".$_SERVER['SERVER_SOFTWARE'];
	echo "<br>server protocol = ".$_SERVER['SERVER_PROTOCOL'];
	echo "<br>server query = ".$_SERVER['QUERY_STRING'];
	echo "<br>server browser = ".$_SERVER['HTTP_USER_AGENT'];
	echo "<br>user ip = ".$_SERVER['REMOTE_ADDR'];
	echo "<br>user port = ".$_SERVER['REMOTE_PORT'];
	
	
$indicesServer = array('PHP_SELF', 
'argv', 
'argc', 
'GATEWAY_INTERFACE', 
'SERVER_ADDR', 
'SERVER_NAME', 
'SERVER_SOFTWARE', 
'SERVER_PROTOCOL', 
'REQUEST_METHOD', 
'REQUEST_TIME', 
'REQUEST_TIME_FLOAT', 
'QUERY_STRING', 
'DOCUMENT_ROOT', 
'HTTP_ACCEPT', 
'HTTP_ACCEPT_CHARSET', 
'HTTP_ACCEPT_ENCODING', 
'HTTP_ACCEPT_LANGUAGE', 
'HTTP_CONNECTION', 
'HTTP_HOST', 
'HTTP_REFERER', 
'HTTP_USER_AGENT', 
'HTTPS', 
'REMOTE_ADDR', 
'REMOTE_HOST', 
'REMOTE_PORT', 
'REMOTE_USER', 
'REDIRECT_REMOTE_USER', 
'SCRIPT_FILENAME', 
'SERVER_ADMIN', 
'SERVER_PORT', 
'SERVER_SIGNATURE', 
'PATH_TRANSLATED', 
'SCRIPT_NAME', 
'REQUEST_URI', 
'PHP_AUTH_DIGEST', 
'PHP_AUTH_USER', 
'PHP_AUTH_PW', 
'AUTH_TYPE', 
'PATH_INFO', 
'ORIG_PATH_INFO') ; 

echo '<table cellpadding="2">' ; 
foreach ($indicesServer as $arg) { 
    if (isset($_SERVER[$arg])) { 
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ; 
    } 
    else { 
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ; 
    } 
} 
echo '</table>' ; 
	
// */

?>