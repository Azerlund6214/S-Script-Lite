<?php


	## Убрать ВСЕ пробелы
	function SF_Delete_All_Spaces ( &$STR_TEXT )
	{
		$STR_TEXT = preg_replace( '/ {1,}/'  ,  ''  , $STR_TEXT ) ; # Робит
	}


?>