<?php


		### $Unit = G M K B
		### $Action = Echo echo E e  ���  Get get G g
		### Return: True = ������� ����� Echo
		###         False = ������������ ���������
		###         double = ������� ����� ������
		function SF_Memory_Usage_EchoGet( $Unit = "M", $Action = "Echo", $Peak = false, $Real = false)
		{
			
			if( ! is_bool($Peak) || ! is_bool($Real) ) //�������� ����� ������� � ����� �����
			{
				echo "<br>�� BOOL ��������� Peak($Peak) ��� Real($Real).(Return false)";
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
						$MSG = "������ ������ ������";
						switch( $Unit )
						{
							case "G": 	echo "<br>$MSG �����: ".(double)$ram/1024/1024/1024; return true;
							case "M": 	echo "<br>$MSG �����: ".(double)$ram/1024/1024; return true;
							case "K": 	echo "<br>$MSG �����: ".(double)$ram/1024; return true;
							case "B": 	echo "<br>$MSG ���� : ".(double)$ram; return true;	
							default: echo "<br>������ � ������� ���������.(Return false)"; return false;
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
							default: echo "<br>������ � ������� ���������(Return false)."; return false;
						}
			
				default: 
						echo "<br>������������ �������(EchoGet)(Return false)."; 
						return false;
			
			}# End SW Action
			
		}#End Func



?>