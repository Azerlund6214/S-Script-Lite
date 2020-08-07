<?php
	
	/*
	// наш обработчик ошибок
	function myHandler($level, $message, $file, $line, $context) {
		// в зависимости от типа ошибки формируем заголовок сообщения
		switch ($level) {
			case E_WARNING:
				$type = 'Warning';
				break;
			case E_NOTICE:
				$type = 'Notice';
				break;
			default;
				// это не E_WARNING и не E_NOTICE
				// значит мы прекращаем обработку ошибки
				// далее обработка ложится на сам PHP
				return false;
		}
		// выводим текст ошибки
		echo "<h2>$type: $message</h2>";
		echo "<p><strong>File</strong>: $file:$line</p>";
		echo "<p><strong>Context</strong>: $". join(', $', 
		array_keys($context))."</p>";
		// сообщаем, что мы обработали ошибку, и дальнейшая обработка не требуется
		return true;
	}

	// регистрируем наш обработчик, он будет срабатывать на для всех типов ошибок
	set_error_handler('myHandler', E_ALL);
	*/
	
	
	/*
	# throw new Exception('123');
	# обработчик для исключений, которые брошены вне блока try-catch и не были обработаны.
	# После вызова такого обработчика выполнение скрипта будет остановлено:
	set_exception_handler( function($exception)
	{
		/* @var Exception $exception /
		echo $exception->getMessage(), "<br/>\n";
		echo $exception->getFile(), ':', $exception->getLine(), "<br/>\n";
		echo $exception->getTraceAsString(), "<br/>\n";
	} );
	*/
	
	
?>