<?php


		### ЗАКОНЧЕНО
		# Класс + трейты = $this
		# ИМЯ КЛАССА ИЗ ОБЪЯВЛЕНИЯ
		# Только трейт = "T_Small_Func" (как в use) # Без ковычек выдест Notice, но выведет
		# Anychar , FUNC , VARS
		function SF_Print_Class_Func_and_Vars( $target='Main_class' , $what="any char")
		{
			
			echo "<pre>";
			
			echo "<hr color=red>"; 
			echo "<hr color=red>"; 
			
			switch( $what )
			{
				case "FUNC":
					echo "<hr>Все методы класса:";
					print_r( @get_class_methods( $target ) );
					break;
					
				case "VARS":
					echo "<hr>Все ПОЛЯ класса:"; 
					print_r( @get_object_vars( $this ) );
					break;
					
				default:
						echo "<hr>Все методы класса:";
						print_r( @get_class_methods( $target ) );
						
						echo "<hr color=blue>Все ПОЛЯ класса:"; 
						print_r( get_object_vars( $this ) );
			}
			
			echo "<hr color=red>"; 
			echo "<hr color=red>"; 
	
			echo "</pre>";
		}



?>