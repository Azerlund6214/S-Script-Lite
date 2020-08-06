<?php

$path_to_libs_local = "s-script/frontend/js-libs-local";

$ARR_FRONTEND_LIBS = array(
					
	'Smooth-Scroll-Nav'     => [
								'<!-- Плавная прокрутка = Работает + учитывает высоту навбара(сам дописывал) -->',
								'<script src="'.$path_to_libs_local.'/ALL=SmoothScroll/Smooth-Scroll-Nav/smooth-scroll-nav-final-1.js" type="text/javascript"> </script>',
								],
	
	'BigAntiplagiatSystem'     => [
								'<!-- BAS - Big Antiplagiat System -->',
								'<script src="'.$path_to_libs_local.'/BAS=BigAntiplagiatSystem/big_antiplagiat_main_settins.js" type="text/javascript"> </script>',
								'<script src="'.$path_to_libs_local.'/BAS=BigAntiplagiatSystem/misc.js"              type="text/javascript"> </script>',
								'<script src="'.$path_to_libs_local.'/BAS=BigAntiplagiatSystem/hotkeys_my_final.js"  type="text/javascript"> </script>',
								'<script src="'.$path_to_libs_local.'/BAS=BigAntiplagiatSystem/block_selection.js"   type="text/javascript"> </script>',
								'<script src="'.$path_to_libs_local.'/BAS=BigAntiplagiatSystem/text_source_adder.js" type="text/javascript"> </script>',
								],
	
	'UNIV_Exec_AJAX'     => [
								'<!-- *** ФУНКЦИЯ ДЛЯ АЯКСА = ВСЕ ИДЕТ ЧЕРЕЗ НЕЁ *** -->',
								'<script src="'.$path_to_libs_local.'/univ_exec_ajax.js" type="text/javascript"> </script>',
								],
	
	'test123'     => "ссылка на сдн  СРАЗУ ЛИНКИ!!!! <link...>",
	'название-версия'     => "ссылка на сдн",
	
	
	'123'     => ["локальный путь к хтмл с линками"],
	

	'example'     => [
							'<!--  -->',
							'<script src="/s-script/.js" type="text/javascript"> </script>',
							],
	
	


	
	'название'     => "ссылка на сдн   МОЖНО сразу несколько лнков в одном массиве. Главное чтоб ровно выводилось",
	'название-версия'     => "ссылка на сдн",
	'название-версия'     => "ссылка на сдн",
	
	
	'test'     => ["test-test"],
	
	
	#''            => $path_to_pages . "landing/Page_index.html"
	
  
);


?>