<?php


$pages_arr = array
( 
	"landing" => [
					################################
					"HEADERS" =>
								[
									"<title> Это tile Лендинга </title>",
									"<meta name=\"description\" content=\" ЗАПОЛНИТЬ (описание страницы(2-3 строки)) \" />"
								],
					################################
					"BODY" =>
								[
									"PRELOADER" => "/_PRELOADERS/preloader_1/preloader-1.html",   # указывать для каждой страницы
									"HEADER"    => "/_HEADERS/header_1/header_my_from_video.html",
									"FOOTER"    => "/_FOOTERS/footer_1/footer_1.html",
													
									# Тело страницы (тег <main>)
									"MAIN" =>   [
														"FOR_TEST" . "/" ."test1" . "/" . "starter=original.php",
														"FOR_TEST" . "/" ."test_scroll" . "/" . "test_scroll.html",
														"_SITE_PETS" . "/" . "cat_1" . "/" . "site_pet_cat_1.html",
														"FOR_TEST" . "/" ."table_brk_colors" . "/" . "table.html",
														#"FOR_TEST" . "/" ."echo_css_classes" . "/" . "echo_css_classes.php",
														"FOR_TEST" . "/" ."particles" . "/" . "particles.html",
														"_BTN_TO_TOP" . "/" . "btn_to_top_1.html"
														
														
														#"section1",
														#"section2",   # ТЕСТОВАЯ УДАЛИТЬ
														#"advantages1"
														# заполнить
													],
									#
												
									# Скрипты в конце body  (подставится в SRC="") (Лок файлы и веб ссылки)
									# Потом можно сделать в ЭТОМ файле переменную - путь к папке js
									"SCRIPTS" => [
													#"testfooter  js",
													#"testfooter2 js"
												]
												
								
								] # End body
					################################
				] # End page data (landing)
					
				
	################################################################
	
	
	################################################################	
	
	
	################################################################

); # Конец


# выводим 


?>