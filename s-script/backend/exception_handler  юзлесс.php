<?php
	
	/*
	// ��� ���������� ������
	function myHandler($level, $message, $file, $line, $context) {
		// � ����������� �� ���� ������ ��������� ��������� ���������
		switch ($level) {
			case E_WARNING:
				$type = 'Warning';
				break;
			case E_NOTICE:
				$type = 'Notice';
				break;
			default;
				// ��� �� E_WARNING � �� E_NOTICE
				// ������ �� ���������� ��������� ������
				// ����� ��������� ������� �� ��� PHP
				return false;
		}
		// ������� ����� ������
		echo "<h2>$type: $message</h2>";
		echo "<p><strong>File</strong>: $file:$line</p>";
		echo "<p><strong>Context</strong>: $". join(', $', 
		array_keys($context))."</p>";
		// ��������, ��� �� ���������� ������, � ���������� ��������� �� ���������
		return true;
	}

	// ������������ ��� ����������, �� ����� ����������� �� ��� ���� ����� ������
	set_error_handler('myHandler', E_ALL);
	*/
	
	
	/*
	# throw new Exception('123');
	# ���������� ��� ����������, ������� ������� ��� ����� try-catch � �� ���� ����������.
	# ����� ������ ������ ����������� ���������� ������� ����� �����������:
	set_exception_handler( function($exception)
	{
		/* @var Exception $exception /
		echo $exception->getMessage(), "<br/>\n";
		echo $exception->getFile(), ':', $exception->getLine(), "<br/>\n";
		echo $exception->getTraceAsString(), "<br/>\n";
	} );
	*/
	
	
?>