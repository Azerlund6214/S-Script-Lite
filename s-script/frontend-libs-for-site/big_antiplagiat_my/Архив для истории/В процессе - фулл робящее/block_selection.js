

//��������� ��������� ������
function preventSelection()
{
	
	// ������� ���������
	function removeSelection()
	{
		if (window.getSelection)
			window.getSelection().removeAllRanges();
		else
		if (document.selection && document.selection.clear)
			document.selection.clear();
	}
	
	
	// ����� ��������� = ��� ��������	
	document.addEventListener( 'mousemove', function(event) { if( ! Is_Throwed_Tag(event) ){ removeSelection(); }   } );
	
	// ����� ��������� = ��� ������� ���	
	document.addEventListener( 'mousedown', function(event) { if( ! Is_Throwed_Tag(event) ){ removeSelection(); }   } );
	
}


// ���������
if( sel_killer_active ) preventSelection( );





/* End */