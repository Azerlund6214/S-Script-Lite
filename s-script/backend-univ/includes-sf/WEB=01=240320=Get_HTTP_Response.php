<?php


	
	### ���������
	### ����������� � ����������
	### return 3-������� ���(������)
	### return -1 (������)
	function SF_Get_HTTP_Response( $URL = "https://www.yandex.ru" )
	{
		/*
		$ch = curl_init('http://yoururl/');
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$c = curl_exec($ch);
		return curl_getinfo($ch, CURLINFO_HTTP_CODE);
		// */
		
		$Answer = @get_headers( $URL , 1 ); # ��� 1 ����� �� ������������(��� � ����)
		
		if( empty($Answer) )
			return -1;
		
		return substr($Answer[0], 9, 3 ); // HTTP/1.1 404 Not Found
		
		
	}




?>