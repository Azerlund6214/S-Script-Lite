<?php


	### ���������
	### ����������� � ����������
	### ������ ������ []=>[]
	### return -1 (������)
	function SF_Get_Server_Headers( $URL = "https://www.yandex.ru" )
	{
		$Answer = @get_headers( $URL , 1 ); # ��� 1 ����� �� ������������(��� � ����)
		
		
		if( empty($Answer) )
			return -1;
		
		return $Answer; 	
	}



?>