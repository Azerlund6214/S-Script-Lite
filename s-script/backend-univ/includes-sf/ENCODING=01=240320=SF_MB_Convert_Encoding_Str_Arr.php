<?php


		### На пересбор
		### Работает
		function SF_MB_Convert_Encoding_Str_Arr( &$array , $Current_Encode , $Target_Encode = "UTF-8")
		{	
			
			if( is_string( $array ) )
				$array = mb_convert_encoding(  $array , $Target_Encode , $Current_Encode );
		
			if( is_array( $array ) )
				foreach( $array as &$item )
					$item = mb_convert_encoding(  $item , $Target_Encode , $Current_Encode );
					
		}



?>