<?php


# Записывать в переменную "UN_SRVCONST"
class MAIN_SSCRIPT_CLASS
{
	
	public $PAGE_NAME = ""; # Текущая страница для вывода
	
	
	public $Pages_info_arr  = array( ); # Все данные о страницах
	public $Pages_names_arr = array( ); # Список имен страниц
	
	public $Page_nof_fount_target = "404"; # Имя страницы если искомая не найдена
	
	public $Libs_for_sections_arr = array(  ); # =[] в секциях,  потом будет очистка от дублей
	# $this->Libs_for_sections = array_merge( $this->Libs_for_sections , массив в секции )
	
	#############################################################
	
	function __construct()
	{
		# echo "<br> Создан класс ".$this->Class_Name; 
	}
	
	function __destruct() 
	{	
		# echo "<br> Уничтожается класс ".$this->Class_Name ;
	}
	
	#############################################################

	
	#############################################################
	
	# СЕЙЧАС ТУТ ВСЯ ПАГИНАЦИЯ + дефолт страница
	# Получить и разобрать имя текущей страницы
	function Get_current_page_name(  )
	{
		
		/* # Старое, робит
		# ЕСЛИ Было введено значение page и НЕ пустое - принимаем, ИНАЧЕ дефолт
		if ( isset($_GET["page"]) && @$_GET["page"] !== "" )
			$PAGE = @$_GET["page"] ; # Пришла НЕ ПУСТАЯ страница
			else
			$PAGE = "landing"; # Дефолт
		*/
		
		//$path = parse_url() # Альтернатива парсинга, юзлесс
		
		
		# Фулл гайд по парсу URL = https://snipp.ru/php/url-tekuschey-stranicy#link-tolko-osnovnoy-put
		
		$url = $_SERVER['REQUEST_URI']; # /category/page#a123?sort=asc
		$url = explode('?', $url);
		$url = $url[0]; # /category/page

		$url = explode('/', $url); # ( "" , category , page )
		$url = trim( $url[1] );
		
		# Преобразование страницы с нижний регстр (только для АНГЛ)
		$PAGE = strtolower( $url );
		
		
		//SF_PRINTER( $url , "V") ; exit;
		
		if ( $PAGE === "" )
			$this->PAGE_NAME = "landing"; # Дефолтная страница для пустого запроса
		else
			$this->PAGE_NAME = $PAGE;
		
	}
	

	#############################################################
	
	# Получить строку с адресом страницы (Любой + любого проекта)
	function Get_page_folder( $PAGE="CURRENT" )
	{
	
		
		if ( $PAGE === "CURRENT" )
			return "project/pages_content/" . $this->PAGE_NAME;		
		
		return "project/pages_content/" . $PAGE;
		
	}
	
	#############################################################
	
	#############################################################
	
	#############################################################
	
	#############################################################
	
	# Считать массив инфы о проекте
	function Get_project_pages_arr( &$declared , &$info_arr , &$pages_arr )
	{
		if ( ! $declared ) exit( "EXIT-Get_project_pages_arr() = Проект с таким именем не был найден. (Массив не объявлен)" );
		
		$this->Pages_info_arr  = $info_arr  ;
		$this->Pages_names_arr = $pages_arr ;
		
		unset ( $declared , $info_arr , $pages_arr );
	}
	
	#############################################################
	
	function Check_page_exist( $page = "CERRENT" )
	{
		if ( $page === "CERRENT" )
		{
			if( ! in_array( $this->PAGE_NAME , $this->Pages_names_arr ) )
			{
				# Дефолтная страница для несуществующей страницы (корень)
				
				header( "Location: /" , true , 301 ); # Редирект на главную
				#header( "Location: /?page=404" , true , 301 );
								
			}
		}
		
		return (string)in_array( $page , $this->Pages_names_arr );
	}
	
	
	#############################################################
	
	function Get_page_data( $PARAM , $PAGE = "CURRENT" )
	{
		//echo $PARAM , $PAGE;
		
		if( $PAGE === "CURRENT" )
		{
			$res = @$this->Pages_info_arr[ $this->PAGE_NAME ][ $PARAM ];
			
			if( ! isset($res) )
			{
				echo "\n<!-- Не найден блок в Get_page_data(): \n PARAM = $PARAM = Пропускаю его -->\n\n\n";
				return "";
			}
			return $res;
		}
		
		
		$res = @$this->Pages_info_arr[ $PAGE ][ $PARAM ];
			
		if( ! isset($res) )
		{
			echo "\n<!-- Не найден блок в Get_page_data(): PARAM = $PARAM = Пропускаю его -->\n\n\n";
			return "";
		}	
		return $res;
				
	}
	
	#############################################################
	
	function Add_libs_for_include( $Arr )
	{
		
		$this->Libs_for_sections_arr = @array_merge( $this->Libs_for_sections_arr , $Arr );
		
	}
	
	function Include_libs_for_sections( $Names_asoc_arr )
	{
				
		$Libs_for_sections_arr = @array_unique( $this->Libs_for_sections_arr );
		
		foreach ( $Libs_for_sections_arr as $js_short_name )
					{ @include "s-script/frontend-libs-for-pages/" . $Names_asoc_arr[ $js_short_name ] . ".html" ; }
		
	}
	
	#############################################################
	
	function Echo_curent_vars( $tag = true )
	{
		if ($tag) echo "<pre>";
		
		echo "\n" . "PROJECT_NAME = " . $this->PROJECT_NAME;
		echo "\n" . "PAGE_NAME = " . $this->PAGE_NAME;
		
		echo "\n" . "Get_project_folder() = " . $this->Get_project_folder();
		echo "\n" . "Get_page_folder() = " . $this->Get_page_folder(  );
		
		if ($tag) echo "</pre>";
	
	}
	
	#############################################################
	
	
	
}#END CLASS



?>