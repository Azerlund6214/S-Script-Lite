<?php
	
	# Тут все константы этого конкретного проекта
	
	
	# Подключаются в head на ВСЕХ страницах
	$arr_libs_for_project = array( "UNIV_Exec_AJAX" , "Smooth-Scroll-Nav"  ); # Можно оставлять без элементов
	
	
	
	# Дефолтное значение = 0
	# Возможные значения справа не всегда актуальны
	# Смотреть полый список в папке frontend/css-selectable
	$PROJECT_SELECTABLE_CSS = array(
	
		"text-sel-color" => "1",   # 0 1 2
		"scrollbar"      => "1",   # 0 1 2 ftc
		"body-bg-color"  => "1",   # 0 1 2 3
		"link-a-color"   => "1",   # 0 1
		"brk-colors"     => "ftc"  # ftc(дефолт)
		
	);
	
	
	
	
	# Смотреть полный список в папке frontend/fonts
	$PROJECT_FONTS = array(

	"CDN-GF# main #Roboto      #400,700#cyrillic#sans-serif",
	"CDN-GF#   1  #Open+Sans   #400,700#cyrillic#sans-serif",
	"CDN-GF#   2  #Montserrat  #400,700#cyrillic#sans-serif",
	"CDN-GF#   3  #Merriweather#400,700#cyrillic#serif",
	
	);
	
	

	
	
?>