<?php


		### $Unit = G M K B
		### $Action = Echo echo E e  или  Get get G g
		### Return: True = Успешно вывел Echo
		###         False = Неправильные параметры
		###         double = Успешно выдал данные
		function SF_Memory_Usage_EchoGet( $Unit = "M", $Action = "Echo", $Peak = false, $Real = false)
		{
			
			if( ! is_bool($Peak) || ! is_bool($Real) ) //Написать через запятую в одном исбул
			{
				echo "<br>Не BOOL параметры Peak($Peak) или Real($Real).(Return false)";
				return false;
			}
			
			
			$ram = 0;
			
			if( $Peak )
				$ram = memory_get_peak_usage($Real);
			else
				$ram = memory_get_usage($Real);
			
			
			switch($Action)
			{
				case "Echo":
				case "echo":
				case "E":
				case "e":
						$MSG = "Сейчас занято памяти";
						switch( $Unit )
						{
							case "G": 	echo "<br>$MSG ГБайт: ".(double)$ram/1024/1024/1024; return true;
							case "M": 	echo "<br>$MSG МБайт: ".(double)$ram/1024/1024; return true;
							case "K": 	echo "<br>$MSG КБайт: ".(double)$ram/1024; return true;
							case "B": 	echo "<br>$MSG Байт : ".(double)$ram; return true;	
							default: echo "<br>Ошибка в единице измерения.(Return false)"; return false;
						}
			
				case "Get":
				case "get":
				case "G":
				case "g":
						switch( $Unit )
						{
							case "G": 	return (double)$ram/1024/1024/1024; break;
							case "M": 	return (double)$ram/1024/1024; break;
							case "K": 	return (double)$ram/1024; break;
							case "B": 	return (double)$ram; break;
							default: echo "<br>Ошибка в единице измерения(Return false)."; return false;
						}
			
				default: 
						echo "<br>Неправильная команда(EchoGet)(Return false)."; 
						return false;
			
			}# End SW Action
			
		}#End Func



?>