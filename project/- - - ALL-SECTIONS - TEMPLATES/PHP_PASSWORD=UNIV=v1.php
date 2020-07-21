<?php


# ... .com/abc?pass=pass123
# http://localhost/landing?pass=pass123
# БЕЗ СЛЕША !!!!

$get_name = "pass";
$good_pass = $SS_Class->Get_page_data( "BODY-PASSWORD" );


if ( ! $good_pass )
{
	exit( "В главном массиве не объявлен правильный пароль" );
	// $Pages_info_arr["landing"]["BODY-PASSWORD"] = "pass123";
}


if ( ! $_GET[ $get_name ] )
{
	exit( "Требуется GET-Пароль." );
}


if ( $_GET[ $get_name ] !== $good_pass )
{
	exit( "Неверный пароль." );	
}

echo "
<!-- $HTML_RAZDELITEL -->
<!-- Пароль введен верно -->
<!-- $HTML_RAZDELITEL -->



";

unset( $get_name , $good_pass );


?>