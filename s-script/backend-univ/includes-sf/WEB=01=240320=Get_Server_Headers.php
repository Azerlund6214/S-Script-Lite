<?php


	### ЗАКОНЧЕНО
	### Обязательно с протоколом
	### Вернет массив []=>[]
	### return -1 (ошибка)
	function SF_Get_Server_Headers( $URL = "https://www.yandex.ru" )
	{
		$Answer = @get_headers( $URL , 1 ); # Без 1 будет не асоциативный(Все в кучу)
		
		
		if( empty($Answer) )
			return -1;
		
		return $Answer; 	
	}



?>