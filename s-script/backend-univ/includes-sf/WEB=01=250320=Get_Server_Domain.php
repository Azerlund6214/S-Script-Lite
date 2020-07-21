<?php


	### ЗАКОНЧЕНО
	### Вернет строку "https://www.yandex.ru:80"

	function SF_Get_Server_Domain( $Protocol=true, $Port=false )
	{
		$Domain = $_SERVER['HTTP_HOST'];
		
		
		if ( $Protocol === true)
		{
			$prot = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http://' : 'https://';
			$Domain = $prot.$Domain;
		}
		
		
		if ( $Port === true)
			$Domain = $Domain.":".$_SERVER['SERVER_PORT'];
		
		
		return $Domain; 	
	}



?>