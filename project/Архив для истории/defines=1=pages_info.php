<?php

/*
	TITLE = 12 слов — до 70-80 символов

	DESCRIPTION = 70 до 140 символов  (description — 160-290 символов)
	краткого описания содержимого страницы для индексации и вывода сопроводительной информации в выдаче результатов поиска
	
	KEYWORDS = Почти все поисковики игнорируют слова из этого списка. 
	Количество слов 5-10.    Тег не оказывает влияния на ранжирование.
*/
# !!! Если забыть запятую в массиве, то будет белый экран без тегов и ошибок



# Юзается в Конце хедера в 8=page-meta
# Юзается в индексе в проверке страницы
# Юзается в во всем боди
function Project_Page_Info( $PAGE , $PARAM , $PAGE_FOLDER = "default_arg" )
{
	
	/*
	echo "<br> PAGE = $PAGE";
	echo "<br> PARAM = $PARAM";
	echo "<br> PAGE_FOLDER = $PAGE_FOLDER";
	echo "<br><br>";
	# */
	
	################# РАБОТАЕТ
	$Page_cases = array("landing","landing12"); # Руками для каждого проекта
	
	if ( $PARAM === "EXIST-TEST" ) # Ищем, есть ли такая страница - Тестится сразу после получения page в индексе
		if ( in_array( $PAGE, $Page_cases ) )
			return true;  else  return false;
	#################
	
	# Если нет аргумента - берем дефолтный путь
	if ( $PAGE_FOLDER === "default_arg" )
		$PAGE_FOLDER = constant("DEFINED_PAGE_FOLDER"); # Вытаскиваю константу
	
	#################
	
	
	
	#################
	#echo "land";
	
	switch ( $PAGE )
	{
		case "landing" :
			
			switch( $PARAM )
			{
				case "TITLE":   echo "Это CASE-TITLE Лендинга";  break;
				case "DESC" :   echo "Это CASE-DESC Лендинга";  break;
				#
				#
				#case "BODY-PRELOADER":  include "$PAGE_FOLDER/1=preloader.php";  break;
				case "BODY-PRELOADER":  include "$PAGE_FOLDER/PRELOADER/preloader-1 = 2.html";  break;
				case "BODY-HEADER"   :  include "$PAGE_FOLDER/HEADER/header_1/header_my_from_video.html";  break;
				#case "BODY-HEADER"   :  include "$PAGE_FOLDER/2=header.php";  break;
				case "BODY-FOOTER"   :  include "$PAGE_FOLDER/FOOTER/footer_1.html";  break;
				#
				case "BODY-MAIN"   :
										include "$PAGE_FOLDER/BTN_TO_TOP/btn_to_top_univ.html";
										include "$PAGE_FOLDER/SITE_PET/cat_1/site_pet_cat.html";
										#include "$PAGE_FOLDER/3=main-1.php";
										#include "$PAGE_FOLDER/3=main-2.php";
										#include "$PAGE_FOLDER/3=main-3.php";
										#include "$PAGE_FOLDER/FOR_TEST/smooth-scroll.html";
										include "$PAGE_FOLDER/FOR_TEST/brk-colors-table.html"; # ПЕРЕДЕЛАТЬ
										#include "$PAGE_FOLDER/FOR_TEST/scrollbar.php";
										break;
				#
				# Инкулды ТОЛЬКО для этой страницы
				case "BODY-SCRIPTS-PAGE"  : return array(
															"Animate.css=v3.7.2=CDN",
															"FontAwesome.css=v5.13.0=CDN",
															"Particles_my=v2.0.0=LOCAL",
															"TypeWriteText=LOCAL"
															);
											break;
											#
				default: echo "\n<!-- Не найден блок = $PARAM = Пропускаю его -->"; break; # Если такого блока нет, то просто игнор
				#
				# Подумать куда деть скрипты(еще кейс с массивом) и нужны ли они
				#
			}
			break; # End PAGE CASE
		
		
		
		
		
		default: exit("<hr>АХТУНГ<hr>В свитче страниц cработал Default-case (Проскочила НЕВАЛИДНАЯ страница)"); break;
		#
	} # End PAGE switch
	#
} # END FUNC





?>