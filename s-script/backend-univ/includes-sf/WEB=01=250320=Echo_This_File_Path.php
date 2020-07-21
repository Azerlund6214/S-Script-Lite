<?php


	### ���������
	### ������� ���� �� �����, ������� ������ ������� (���� �� ����� ����� (�� �������� �������))
	# ACTION = ECHO / RETURN
	# TARGET = FILE / FOLDER
	# DIR = ���������� __DIR__ �� ����� ������ ������� (����� ��� � ������)
	function SF_Echo_This_File_Path( $ACTION="ECHO" , $TARGET = "FILE" , $DIR = "")
	{
		
		# ������ ������� �������:  (PATH = __FILE__ ��� ������ ���� �������)
		#$PATH = str_replace ( "\\", "/", $PATH); # ����� ������ ��� �������, �� ����� ��� ����� ����� ����������
		#echo str_replace ( $_SERVER['DOCUMENT_ROOT'] , "" , $PATH );
		
		
		if ( $TARGET === "FILE" )
		{
			$file_caller = debug_backtrace()[0]['file']; # ������ ���� �� ���������� �����
			
			$file_caller = str_replace ( "\\", "/", $file_caller); # ����� ������ ��� �������, �� ����� ��� ����� ����� ����������
			$result = str_replace ( $_SERVER['DOCUMENT_ROOT'] , "" , $file_caller );
			
		}
		else
		{
			# ���� ����� �����
			$file_dir = str_replace ( "\\", "/", $DIR); # ����� ������ ��� �������, �� ����� ��� ����� ����� ����������
			$result = str_replace ( $_SERVER['DOCUMENT_ROOT'] , "" , $file_dir );
		}
		
		$result = substr($result,1); # �������� ���� � ������ (���� �� ������� �������)
		
		if ( $ACTION === "ECHO" )
			echo $result;
		else
			return $result;
		
	}



?>