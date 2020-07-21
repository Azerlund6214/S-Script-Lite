<?php


	### ЗАКОНЧЕНО
	### Выводит путь до файла, который вызвал функцию (путь от корня САЙТА (НЕ Файловой системы))
	# ACTION = ECHO / RETURN
	# TARGET = FILE / FOLDER
	# DIR = Переменная __DIR__ из места вызова функции (прямо так и писать)
	function SF_Echo_This_File_Path( $ACTION="ECHO" , $TARGET = "FILE" , $DIR = "")
	{
		
		# Старый рабочий вариант:  (PATH = __FILE__ при вызове этой функции)
		#$PATH = str_replace ( "\\", "/", $PATH); # Нужно только для локалки, на хосте все слеши сразу правильные
		#echo str_replace ( $_SERVER['DOCUMENT_ROOT'] , "" , $PATH );
		
		
		if ( $TARGET === "FILE" )
		{
			$file_caller = debug_backtrace()[0]['file']; # ПОЛНЫЙ путь до вызвавшего ФАЙЛА
			
			$file_caller = str_replace ( "\\", "/", $file_caller); # Нужно только для локалки, на хосте все слеши сразу правильные
			$result = str_replace ( $_SERVER['DOCUMENT_ROOT'] , "" , $file_caller );
			
		}
		else
		{
			# Если нужна папка
			$file_dir = str_replace ( "\\", "/", $DIR); # Нужно только для локалки, на хосте все слеши сразу правильные
			$result = str_replace ( $_SERVER['DOCUMENT_ROOT'] , "" , $file_dir );
		}
		
		$result = substr($result,1); # Обрезаем слеш в начале (Чтоб не ругался хостинг)
		
		if ( $ACTION === "ECHO" )
			echo $result;
		else
			return $result;
		
	}



?>