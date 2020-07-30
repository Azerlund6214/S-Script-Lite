<?php

# ХОСТИНГ = В начале путей php include не должно быть слеша (иначе 500) !!!!!!!!!!
# ХОСТИНГ = Недопустимая конструкция в HTML  <--### ...   Это ключевое слово для PHP SSI = <--# include 123 -->
# ХОСТИНГ = Всегда прверять логи с сервера, там все ошибки
# ХОСТИНГ = 
# ХОСТИНГ = 

$pre_html_start_time = microtime(true); # таймер для скрипта

#=========================================
# Дефайны


#   <!-- <php echo $HTML_RAZDELITEL ; > -->   тогда положение определяется местом в хтмл и не нужны \n
$HTML_RAZDELITEL = "#################################################################";


#=========================================
# Подготовка

# Настройка среды исполнения PHP
require_once ("s-script/0=PHP_EXECUTE_SETTINS.php");

# Объявление универсальных классов и библиотек
include ("s-script/backend-univ/MAIN=BACKEND_UNIV_INCLUDER.php"); # Доп классы и функции

#=========================================

# ГЛАВНЫЙ КЛАСС-ОБРАБОТЧИК
include ("s-script/0=MAIN_s-script_class.php");

$SS_Class = new MAIN_SSCRIPT_CLASS();

#=========================================

$SS_Class->Get_current_page_name(  ); # Пагинация - находим нужную страницу
//exit ($SS_Class -> PAGE_NAME) ;

#========================

// явная папка проекта тут, в Get_page_folder(), в начале 1=head... в переменной путей фавиконов

# Подключаем главный файл со списком страниц проекта
include "project/" . "defines=1=pages_info_arr.php";

# Объявляем глобальные переменные и дефайны проекта (шрифты + css_selectable)
include "project/" . "defines=2=project_const.php";

# Объявляем php библиотеки и классы для этого проекта
include "project/" . "defines=3=project_includes.php";

#========================

# Разбор и проверка данных о страницах + Проверка существования проекта + unset этих переменных через ссылку
$SS_Class -> Get_project_pages_arr( $Pages_info_arr_declared , $Pages_info_arr, $Pages_names_arr );
# Проверка существования целевой страницы = РАБОТАЕТ (либо 301 на главную ( "Location: /") )
$SS_Class->Check_page_exist( );
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

# Старт сессии, создание класса БД и первичная настройка
include "backend_init.php";

#=========================================

######################################
######## Начало генерации HTML


$pre_html_end_time = microtime(true); # Закончили всю подготовку
$html_start_time = microtime(true); # таймер для html


#=========================================


echo "<!DOCTYPE html> \n";
echo "<html lang='ru'> \n";
	
	echo "<head>";
		
		# В этому моменту УЖЕ загружены все переменные проекта

		include "s-script/0=s-script_logo_includer.php"; # САЙТ
		include "s-script/1=head-all.html"; #


        include "s-script/5=site=bootstrap-connection.html"; # САЙТ
        include "s-script/6=site=css-univ-full.html"; # САЙТ = универсальные ксс
        include "s-script/7=site=css-univ-vars.html"; # САЙТ = универсальные ксс переменные
        include "s-script/8=proj=css_selectable.html"; # ПРОЕКТ - ксс для этого проекта
        include "s-script/9=proj=fonts.html"; # ПРОЕКТ = Шрифты проекта

    echo "</head> \n\n\n";

   // exit("123");

######################################################################
	######################################################################
	######################################################################
	
	
	echo '<body id="body_id" class="font-main grad-harmonic-energy ">'; # Весь боди будет этим шрифтом
		
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