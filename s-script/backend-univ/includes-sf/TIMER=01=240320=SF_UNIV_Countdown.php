<?php


	#1 000 000 Мс = 1с	 
	
	###универсальный обратный отсчет
	### Аргументы:
	### time_sec  => Время ожидания
	### time_step => Шаг вывода оставшегося времени
	### text_beg  => Текст(или теги) перед числом
	### text_end  => Текст(или теги) после числа
	function SF_UNIV_Countdown( $time_sec = 3 , $time_step = 1 , $text_beg = "" , $text_end = "" )	 
	{
		###Перевод в Msec
		$time_msec = $time_sec * 1000000;
		$time_step_msec = $time_step * 1000000;
		
		
		for ( $remained_m = $time_msec     ;    $remained_m > 0    ;     $remained_m -= $time_step_msec )
		{	
			
			### Перевод в секунды для нормального вывода
			$remained_s = $remained_m / 1000000;
			echo $text_beg . $remained_s . $text_end;

			
			usleep($time_step_msec);
		}

		### Чтобы писал 0 в конце
		echo $text_beg."0".$text_end;
		
	}



?>