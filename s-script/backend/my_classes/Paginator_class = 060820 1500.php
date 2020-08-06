<?php


/**
 *
 * @method static 123()
 */
class Paginator
{
    
    
    #public static $alphabet_eng_big = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    
    
    /**
     *
     *
     */
    
    /**
     * Шаблон
     * @param integer $ -
     * @param string $ -
     * @return string
     */
    
    
    

    
    public static function getRouteToFile( $arr_routes )
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
    
        $uri = $_SERVER['REQUEST_URI']; # /category/page#a123?sort=asc
        $expl = explode('?', $uri);
        $url = $expl[0]; # /category/page
        $params = $expl[1]; # ?sort=asc
    
        #$url = explode('/', $url); # ( "" , category , page )
        #$url = trim( $url[1] );
    
        # Преобразование страницы с нижний регстр (только для АНГЛ)
        $PAGE = strtolower( $url );
    
    
        # Убраем / в конце ссылок (в тч и "/" будет "")
        if ( substr ($PAGE, strlen ($PAGE)-1, 1) === "/" )
            $PAGE = substr($PAGE,0,-1);
    
    
        
        //if( in_array($uri, array_keys($arr_routes) ) )
        if( ! array_key_exists($PAGE, $arr_routes) )
            self::redirectToMain(); //echo "NE nashli"; //
        
         
        //echo "nashli<br>";
        return $arr_routes[$PAGE];
    
        
    
    }
    
    
    public static function redirect( $Target_url , $code = 301 )
    {
        header( "Location: $Target_url" , true , $code );
    }
    
    public static function redirectToMain(  )
    {
        header( "Location: /" , true , 301 );
    }





}
?>