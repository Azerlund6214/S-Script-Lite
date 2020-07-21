<?php

/*
	TITLE = 12 слов — до 70-80 символов
	Оптимальный размер Title — 70-80 знаков.

	DESCRIPTION = 70 до 140 символов  (description — 160-290 символов)
	краткого описания содержимого страницы для индексации и вывода сопроводительной информации в выдаче результатов поиска
	
	KEYWORDS = Почти все поисковики игнорируют слова из этого списка. 
	Количество слов 5-10.    Тег не оказывает влияния на ранжирование.
	
	Сниппет — фрагмент текста, который представляет сайт в результатах поисковой выдачи. В декабре 2017 года Google расширил длину сниппетов с 160 до 320 символов с пробелами. Для кириллицы следует ориентироваться на длину в 280 символов.
	
*/
# !!! Если забыть запятую в массиве, то будет белый экран без тегов и ошибок



$Pages_info_arr_declared = true; # Объявлен ли массив

$Pages_info_arr = array( );

$Page_folder = $SS_Class->Get_page_folder( ) ;

###############################
 
 $Pages_info_arr["landing-test"]["TITLE"] = "Это TITLE Лендинга";
 $Pages_info_arr["landing-test"]["DESC"]  = "Это DESC Лендинга";

 $Pages_info_arr["landing-test"]["BODY-MAIN"] []= $Page_folder . "/BODY=first-test.html";
 $Pages_info_arr["landing-test"]["BODY-MAIN"] []= $Page_folder . "/SINGLE=SITE_PET=sample-1-cat=v0/pet.html";

 
 
###############
 
 $Pages_info_arr["landing"]["TITLE"] = "Это TITLE Лендинга";
 $Pages_info_arr["landing"]["DESC"]  = "Это DESC Лендинга";

#$Pages_info_arr["landing"]["BODY-PASSCHECK"] = $Page_folder . "/PHP_PASSWORD=UNIV=v1.php";
#$Pages_info_arr["landing"]["BODY-PASSWORD"] = "pass123";
 
 $Pages_info_arr["landing"]["BODY-PRELOADER"] = $Page_folder . "/SINGLE=PRELOADER=sample-1-univ=v1.html";
 $Pages_info_arr["landing"]["BODY-HEADER"]    = $Page_folder . "/SINGLE=HEADER=sample-1-univ=v1.html";
 $Pages_info_arr["landing"]["BODY-FOOTER"]    = $Page_folder . "/footer-test.html";

 ###
 
 $Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/SINGLE=BTN_TO_TOP=sample-1-univ=v0.html";
 $Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/SINGLE=SITE_PET=sample-1-cat=v0/pet.html";
 
 $Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/BODY=first-test.html";
 
 $Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/FOR_TEST/br5.html";
 $Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/FOR_TEST/brk-colors-table.html";
 $Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/FOR_TEST/smooth-scroll.html";
 $Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/FOR_TEST/scrollbar.php";

 #$Pages_info_arr["landing"]["BODY-MAIN"] []= $Page_folder . "/FOR_TEST/test1.html";

 
 
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