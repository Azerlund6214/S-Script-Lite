<?php


		# �� ������
		
		### Input = string
		###         [] => string
		###         [][] => string
		### OnError: Echo "������"
		### array_walk( $ARR , "SF__TRIM" );
		function SF_Trim_Arr( &$var )
		{
			//�������� �� 2-� � ����� ������ ������� � �� 1-���� ������� �� �����
			//��� ���� ������ ��������� (������ � �����)
			//��� ���� ������ ������
			
			switch( gettype($var) )
			{
				
				case "string":
							$var = trim($var);
							return;
					
				case "array":
							if (! is_string($var[0]))
							{
								echo "<font color=red size=6>������ ������ �� ����� = return</font>";
								return;
							}
							foreach( $var as &$item )
								$item = trim($item);
								
							return;
				
				default:
							echo "<font color=red size=6>������ �� ������ ��� ������ �� ����� 
									��� 2-� � ����� ������ ������=return</font>"; 
							return;
			
			}
			
		}# End Func




?>