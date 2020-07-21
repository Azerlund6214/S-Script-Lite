<?php


		# Не тестил
		
		### Input = string
		###         [] => string
		###         [][] => string
		### OnError: Echo "Ошибка"
		### array_walk( $ARR , "SF__TRIM" );
		function SF_Trim_Arr( &$var )
		{
			//Проверка на 2-х и более мерные массивы и на 1-мерн массивы не строк
			//Что если массив смешанный (строки и числа)
			//Что если придет объект
			
			switch( gettype($var) )
			{
				
				case "string":
							$var = trim($var);
							return;
					
				case "array":
							if (! is_string($var[0]))
							{
								echo "<font color=red size=6>Пришел массив НЕ строк = return</font>";
								return;
							}
							foreach( $var as &$item )
								$item = trim($item);
								
							return;
				
				default:
							echo "<font color=red size=6>Пришла не строка или массив не строк 
									или 2-х м более мерный массив=return</font>"; 
							return;
			
			}
			
		}# End Func




?>