<?php


	### ������� ��� ������ 1 �������
	function SF_Delete_Double_Spaces( &$STR_TEXT )
	{
		$STR_TEXT = preg_replace( '/ {2,}/'  ,  ' '  , $STR_TEXT );
	}

?>