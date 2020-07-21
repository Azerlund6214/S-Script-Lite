<?php

/*
	TITLE = 12 слов — до 70-80 символов

	DESCRIPTION = 70 до 140 символов  (description — 160-290 символов)
	краткого описания содержимого страницы для индексации и вывода сопроводительной информации в выдаче результатов поиска
	
	KEYWORDS = Почти все поисковики игнорируют слова из этого списка. 
	Количество слов 5-10.    Тег не оказывает влияния на ранжирование.
*/
# !!! Если забыть запятую в массиве, то будет белый экран без тегов и ошибок



# Функция есть ли страница
# Функция вывода по параметру ИЛИ вывод ошибки(дефолт)


$Pages_info_arr_declared = true; # Объявлен ли массив

$Pages_info_arr = array( );

$Page_folder = $SS_Class->Get_page_folder( ) ;

###############################


$Pages_info_arr["landing"]["TITLE"] = "Это TITLE Лендинга";
$Pages_info_arr["landing"]["DESC"]  = "Это DESC Лендинга";

$Pages_info_arr["landing"]["BODY-PRELOADER"]  = $Page_folder . "/PRELOADER/preloader-1 = 2.html";
#$Pages_info_arr["landing"]["BODY-HEADER"]    = $Page_folder . "/HEADER/header_1/header_my_from_video.html";

$Pages_info_arr["landing"]["BODY-FOOTER"]     = $Page_folder . "/FOOTER/footer_1.html";

$Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/BTN_TO_TOP/btn_to_top_univ.html";
$Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/SITE_PET/cat_1/site_pet_cat.html";
$Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/FOR_TEST/brk-colors-table.html"; # ПЕРЕДЕЛАТЬ
#$Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/FOR_TEST/scrollbar.php";
#$Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/FOR_TEST/smooth-scroll.html";

$Pages_info_arr["landing"]["BODY-SCRIPTS-PAGE"] []= "Animate.css=v3.7.2=CDN";
$Pages_info_arr["landing"]["BODY-SCRIPTS-PAGE"] []= "FontAwesome.css=v5.13.0=CDN";
$Pages_info_arr["landing"]["BODY-SCRIPTS-PAGE"] []= "Particles_my=v2.0.0=LOCAL";
$Pages_info_arr["landing"]["BODY-SCRIPTS-PAGE"] []= "TypeWriteText=LOCAL";

###############

$Pages_info_arr["test"]["DESC"]  = "Это DESC test";
$Pages_info_arr["test"]["TITLE"] = "Это TITLE test";

$Pages_info_arr["test"]["BODY-PRELOADER"] = $Page_folder . "/1=preloader.php";
$Pages_info_arr["test"]["BODY-HEADER"]    = $Page_folder . "/2=header.php";
$Pages_info_arr["test"]["BODY-FOOTER"]    = $Page_folder . "/4=footer.php";

$Pages_info_arr["test"]["BODY-MAIN"] []= $Page_folder . "/3=main-1.php";
$Pages_info_arr["test"]["BODY-MAIN"] []= $Page_folder . "/3=main-2.php";
$Pages_info_arr["test"]["BODY-MAIN"] []= $Page_folder . "/3=main-3.php";

###############




###############################

$Pages_names_arr = array_unique ( array_keys( $Pages_info_arr ) );
unset ( $Page_folder ); # Остальное сетается в индексе в классе через ссылку





?>