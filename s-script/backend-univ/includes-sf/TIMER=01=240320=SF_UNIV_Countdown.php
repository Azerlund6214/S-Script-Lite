<?php


	#1 000 000 �� = 1�	 
	
	###������������� �������� ������
	### ���������:
	### time_sec  => ����� ��������
	### time_step => ��� ������ ����������� �������
	### text_beg  => �����(��� ����) ����� ������
	### text_end  => �����(��� ����) ����� �����
	function SF_UNIV_Countdown( $time_sec = 3 , $time_step = 1 , $text_beg = "" , $text_end = "" )	 
	{
		###������� � Msec
		$time_msec = $time_sec * 1000000;
		$time_step_msec = $time_step * 1000000;
		
		
		for ( $remained_m = $time_msec     ;    $remained_m > 0    ;     $remained_m -= $time_step_msec )
		{	
			
			### ������� � ������� ��� ����������� ������
			$remained_s = $remained_m / 1000000;
			echo $text_beg . $remained_s . $text_end;

			
			usleep($time_step_msec);
		}

		### ����� ����� 0 � �����
		echo $text_beg."0".$text_end;
		
	}



?>