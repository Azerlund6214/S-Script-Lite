<?php


		### ���������
		# ����� + ������ = $this
		# ��� ������ �� ����������
		# ������ ����� = "T_Small_Func" (��� � use) # ��� ������� ������ Notice, �� �������
		# Anychar , FUNC , VARS
		function SF_Print_Class_Func_and_Vars( $target='Main_class' , $what="any char")
		{
			
			echo "<pre>";
			
			echo "<hr color=red>"; 
			echo "<hr color=red>"; 
			
			switch( $what )
			{
				case "FUNC":
					echo "<hr>��� ������ ������:";
					print_r( @get_class_methods( $target ) );
					break;
					
				case "VARS":
					echo "<hr>��� ���� ������:"; 
					print_r( @get_object_vars( $this ) );
					break;
					
				default:
						echo "<hr>��� ������ ������:";
						print_r( @get_class_methods( $target ) );
						
						echo "<hr color=blue>��� ���� ������:"; 
						print_r( get_object_vars( $this ) );
			}
			
			echo "<hr color=red>"; 
			echo "<hr color=red>"; 
	
			echo "</pre>";
		}



?>