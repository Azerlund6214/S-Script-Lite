<?php

	#############################################################

	
	#############################################################
		
		#ВОзможно есть стандартная функция
		# РОБИТ
		# Конвертирует двумерный с 1элем в каждом ряду в одномерный
		function SF_CONVERT_ArrArr_To_Arr( $ArrArr )
		{
			$NewArr = array();
			
			foreach($ArrArr as $a)
				$NewArr[] = $a[0];
			
			return $NewArr ;	
		}
	
	#############################################################
		
		
	
	#############################################################
	
	

	
	
	#############################################################
	
	# Делаем асоциативный массив
	# return [key]=>[val]
	# return array( "ERROR" => "ERROR" )
	function Explode_KeyVal_To_AsocArr( $StringOrArr , $Char="=" )
	{
		# Нет отлова такой ситуации:  aaa=bbb=ccc  будет 3 элемента,  в этой версии третий пропадет
		
		
		$Params_Arr_Asoc = array();
		
		$Type = gettype($StringOrArr);
		
		switch( $Type )
		{
			case "string":	# РОБИТ
							$Buf = explode( $Char , $StringOrArr );
							$Key = $Buf[0];
							$Val = $Buf[1];
							
							$Params_Arr_Asoc[$Key] = $Val;
							
							return $Params_Arr_Asoc;
							
			case "array":	# РОБИТ
							foreach( $StringOrArr as $Pair_key_val )
							{
								# Что если ключ дублиреуется?
								
								$Buf = explode( $Char , $Pair_key_val );
								
								$Key = $Buf[0];
								$Val = @$Buf[1];
								
								if( empty($Val) ) $Val = "EMPTY"; # Если не удалось разделить
								
								$Params_Arr_Asoc[$Key] = $Val;
							}
							
							return $Params_Arr_Asoc;
							
			default:
					echo "<br>Не тот тип данных: ERROR_BAD_TYPE => $Type";
					return array( "ERROR_BAD_TYPE" => "$Type" ) ;
		}
		


		
	}
	#############################################################
	
	
	
	
	#############################################################
	
	
	
	/*
	
	echo '<table border="1">';
		echo '<thead>'; //голова
			echo '<tr>';
				for ($i=0 ; $i < $count_fields ; $i++)
					{	
						echo "<th> $fields[$i] </th>";
					}
			echo '</tr>';
		echo '</thead>';
		
		
		
		
		
		
		echo '<tbody>';       
			
			$result = mysql_query("select $SELECT from $DB_table $WHERE LIMIT $Limit;") or die(mysql_error());
			while($data = mysql_fetch_array($result))
			{ 
				echo '<tr>';
					
					for ($i=0 ; $i < $count_fields ; $i++)
					{	
						$buf = $fields[$i];
						$buf = $data [ $buf ];
						echo "<td> $buf </td>";
					}
					//echo '<td>' . $data['id'] . '</td>';
					
				echo '</tr>';
			}
			
		echo '</tbody>';
		
	echo '</table>';
	
	*/
	
	
	#############################################################
	

	
	
	
	
	/*
	$str_one_tag = preg_replace("'<".$str_one_bad_tag."[^>]*?>.*?</".$str_one_bad_tag.">'si"," ",$str_one_tag);

	// как было
	$tag_good = preg_replace("'<script[^>]*?>.*?</script>'si"," ",$str_one_tag);
	*/
	
	#############################################################
	
	# echo "<hr color=blue> <hr color=red> <hr color=blue>"; ###
	
	#############################################################

	#############################################################
	
	
	#############################################################
	
	
	#############################################################
	
	
	#############################################################
	
	
	#############################################################
	
	
	#############################################################
	
	
	#############################################################
	
	
	#############################################################
	
	
}#END CLASS



	/*
			+------ CV_ptr_ptr[0]
			| +---- CV_ptr_ptr[1]
			| | +-- CV_ptr_ptr[2]
			| | |
			| | +-> CV_ptr[0] --> some zval
			| +---> CV_ptr[1] --> some zval
			+-----> CV_ptr[2] --> some zval
	*/


	### Копипаст не глядя 261118
	



?>