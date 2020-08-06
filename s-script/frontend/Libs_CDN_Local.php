<?php

$path_to_libs_local = "s-script/frontend/js-libs-local";

$ARR_FRONTEND_LIBS = array(
	
	/* ################################## */
	
	'example-1.2-LOC'     => [ '<script src="'.$path_to_libs_local.'/.js" type="text/javascript"> </script>' ],
	'example_1.2-CDN'     => [ '<script src="" type="text/javascript"> </script>' ],
	'example'     => [
							'<!--  -->',
							'<script src="/s-script/.js" type="text/javascript"> </script>',
							],
	
	'test'     => ["test-test"],

	/* ################################## */
		
	'JQuery-3.4.1-CDN'     => [ '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"> </script>' ],
	'JQuery-3.4.1-LOC'     => [ '<script src="'.$path_to_libs_local.'/JQuery-Local/3.4.1/jquery.min.js" type="text/javascript"> </script>' ],
	
	
	'FontAwesome-5.13.0-CDN' => [
						'<!-- FontAwesome v5.13.0 CDN -->',
						'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />',						],
	/*	Нужно правильно прописывать классы Font Awesome     юзать только полный ксс, иначе могут быть квадраты
		для v5 <i class="fas fa-camera-retro"></i>
		для v4 <i class="fa fa-camera-retro"></i>	*/

		
	'Animate-3.7.2-CDN' => [
						'<!-- Animate.css v3.7.2 CDN -->',
						'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">',						],
	
	
	
	/* ################################## */
	
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
								'<script src="'.$path_to_libs_local.'/Univ_Exec_Ajax.js" type="text/javascript"> </script>',
								],
	
	
	/* ################################## */
	
);


?>