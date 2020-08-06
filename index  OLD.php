<?php



$pre_html_start_time = microtime(true); # таймер для скрипта

#=========================================
# Дефайны


#   <!-- <php echo $HTML_RAZDELITEL ; > -->   тогда положение определяется местом в хтмл и не нужны \n
$HTML_RAZDELITEL = "#################################################################";



#========================

/* дебаг
SF_PRINTER( $SS_Class->Pages_info_arr );
SF_PRINTER( $SS_Class->Pages_names_arr );

SF_PRINTER( $SS_Class->Get_page_data( "TITLE" ) );
SF_PRINTER( $SS_Class->Get_page_data( "DESC" ) );
SF_PRINTER( $SS_Class->Get_page_data( "BODY-HEADER" ) );
SF_PRINTER( $SS_Class->Get_page_data( "BODY-MAIN" ) );
SF_PRINTER( $SS_Class->Get_page_data( "BODY-SCRIPTS-PAGE" ) );

$SS_Class -> Echo_curent_vars();
#exit;
*/


#=========================================


#=========================================

######################################
######## Начало генерации HTML


$pre_html_end_time = microtime(true); # Закончили всю подготовку
$html_start_time = microtime(true); # таймер для html


#=========================================




   // exit("123");

######################################################################
	######################################################################
	######################################################################
	
	
	echo ''; # Весь боди будет этим шрифтом
		
		###########################
		### Генерация ВСЕГО body
		###
			
			
			################
			### PRELOADER
			
			echo "\n\n\n<!-- ################################################################ -->\n\n\n";
			
			@include $SS_Class->Get_page_data( "BODY-PASSCHECK" ) ; // php, требующий пароль
			
			@include $SS_Class->Get_page_data( "BODY-PRELOADER" ) ;
			
			#EXIT("EXIT=INDEX - Длинный"); EXIT; EXIT; EXIT; EXIT; EXIT; EXIT; EXIT; EXIT; EXIT;
			
			###
			################
			### HEADER

			echo "\n\n\n<!-- ################################################################ -->\n\n\n";
			
			
			@include $SS_Class->Get_page_data( "BODY-HEADER" ) ;
			
			
			###
			################
			### MAIN

			echo "\n\n\n<!-- ################################################################ -->\n\n\n";
			
			
			echo "<main>\n";
			echo "<!-- *** The main content *** -->"; # 
					
				
				foreach ( $SS_Class->Get_page_data( "BODY-MAIN" ) as $path )
				{
					echo "\n\n\n\n"; # Для отступа между секциями
					@include $path ;
				}
			echo "\n\n\n\n<!-- *** The main content *** -->"; # 3 пустые строки от конца секции
			echo "\n</main>";
			
			###
			################
			### FOOTER
			
			echo "\n\n\n<!-- ################################################################ -->\n\n\n";
			
			echo "\n\n";
				
				@include $SS_Class->Get_page_data( "BODY-FOOTER" ) ;
			
			echo "\n\n";
			
			###
			################
			### SCRIPTS
			
			
			echo "\n\n\n<!-- ################################################################ -->\n\n\n";
			
			
			
			echo "<all-scripts>\n\n"; # ЭТО НЕВАЛИДНЫЙ ТЕГ
				
				# Подключение скриптов, общих для всех сайтов
				include "s-script/90=site=libs-includer.html";
				
				
				# Массив соответствия имен
				include "s-script/frontend-libs-for-pages/0=All_Libs_paths.php";
				
				# Подключение только нужных библиотек
				$SS_Class->Include_libs_for_sections( $Libs_names_match ) ;
				
				
				#exit("index js exit");
				
				
			
			echo "\n</all-scripts>"; # ЭТО НЕВАЛИДНЫЙ ТЕГ
			
			
			###
			################
			
			
			################
			### EXEC Time
			### Подсчет времени исполнения
			
				echo "\n\n\n<!-- ################################################################ -->\n\n\n";
				
				$pre_html_end_time = microtime(true);
				$pre_html_time_sec  = round( $pre_html_end_time  - $pre_html_start_time , 4);
				$pre_html_time_msec = $pre_html_time_sec*1000;
				echo "<!-- От старта индекса до начала HTML: $pre_html_time_sec"."s" . " = ($pre_html_time_msec ms) -->\n";
				
				$html_end_time = microtime(true);
				$html_time_sec  = round( $html_end_time  - $html_start_time , 4);
				$html_time_msec = $html_time_sec*1000;
				echo "<!-- HTML is generated in: $html_time_sec"."s" . " = ($html_time_msec ms) -->\n\n";
				
				echo "<!-- Всего: " . ($html_time_sec + $pre_html_time_sec) ."s -->\n";
				echo "<!-- Всего: " . ($html_time_msec + $pre_html_time_msec) ."ms -->";
			
			### EXEC Time
			################
			
		###
		###########################
		
		echo "\n\n\n<!-- ################################################################ -->\n\n\n";
		
	echo "</body>";
echo "\n</html>";

######## Конец генерации HTML
######################################


####################
#####          #####
##                ##
#                  #
##                ##
#####          #####
####################




?>