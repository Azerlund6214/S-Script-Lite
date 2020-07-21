<?php

echo "<br><font size=3 color=MediumVioletRed> Объявлен класс </font> => <font color=blue>CURL.</font>";

	

# Записывать в переменную "UN_CURL"


class UNIV_PHP_CURL
{
	
	public $Class_Name = "UNIV_PHP_CURL";
	
	
	#############################################################
	
	function __construct()
	{
		echo "<br> Создан класс ".$this->Class_Name; 
	}
	
	function __destruct() 
	{	
		echo "<br> Уничтожается класс ".$this->Class_Name ;
	}
	
	#############################################################
	
		
	function D__DOWNLOAD_WITH_CURL( $URL = null )
	{
		echo "<br>Скачка через CURL";
		
		if( $URL === null )
			$URL = $this -> Current_URL;
	
		###
		#разбор или получение параметров из бд
		
		$ch = curl_init( $URL );

		curl_setopt($ch, CURLOPT_URL, $URL); //задаем урл
		
		//убрать
		//if (isset($post_data)) 
		#{curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);//что после .php? ...
		# curl_setopt($ch, CURLOPT_POST, true);//не 1 ли должно стоять?    }
	  
	  
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // (1) Возвратить данные а не показать в браузере
		curl_setopt($ch, CURLOPT_HEADER, false); // Отключаю(0) в выводе header-ы
		//curl_setopt($curl,CURLOPT_NOBODY,true); //при (1) = не показывать сам документ  	
	  
		//ТОЛЬКО с этими 2 параметрами будет работать https:// ...
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);//отмена проверок
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);//
	  
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
	   
		//редиректы
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1); //авто refer если был редирект "location:"
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); //следовать ли "location:"
		curl_setopt($ch, CURLOPT_MAXREDIRS, 1); //макс редиректов по "location:"
	  
		
		
		//вывести перем в глобальные
		$curl_user_agent = 'Mozilla/5.0 (Windows NT 6.3; Win64; x64)' ; //  // AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36';
		curl_setopt($ch, CURLOPT_USERAGENT, $curl_user_agent);
		
		
		
	  $headers = [
		'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
		'Accept-Language: ru,en-us;q=0.7,en;q=0.3',
		'Accept-Encoding: deflate',   //грузит
		'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7'] ;
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); //указываем заголовок для отправки

		  
		//curl_setopt($ch, CURLOPT_REFERER, $main_domain);//рефер для моего хедера
	  
		#curl_setopt($ch, CURLOPT_COOKIEJAR, "elib_cookie.txt");//т к CURLOPT_USERAGENT
		#curl_setopt($ch, CURLOPT_COOKIEFILE,"elib_cookie.txt");
	  
	  
		
	  
		$html = curl_exec($ch);    //html код страницы
	  
		if( curl_errno($ch) )
		{
			echo "<br>CURL ошибка номер: ".curl_errno($ch)." - ".curl_error($ch);
			$this -> SHD_Current_HTML = "DOWNLOAD_ERROR";
			return;
		}
		
		curl_close($ch);
		
		
		
		$this -> SHD_Current_HTML = str_get_html( $html );
	}


	function D__DOWNLOAD_WITH_CURL_PROXY( $URL = null , $PROXY_IP = null)
	{
		echo "<br>Скачка через CURL proxy";
		
		if( $URL === null )
			$URL = $this -> Current_URL;
		
		if( $PROXY_IP === null )
		{
			$PROXY_IP = $this->GL_curl_proxy_ip;
		}
		
		
		###
		#разбор или получение параметров из бд
		
		$ch = curl_init( $URL );

		curl_setopt($ch, CURLOPT_URL, $URL); //задаем урл
		
		//убрать
		//if (isset($post_data)) 
		#{curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);//что после .php? ...
		# curl_setopt($ch, CURLOPT_POST, true);//не 1 ли должно стоять?    }
	  
	  
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // (1) Возвратить данные а не показать в браузере
		curl_setopt($ch, CURLOPT_HEADER, false); // Отключаю(0) в выводе header-ы
		//curl_setopt($curl,CURLOPT_NOBODY,true); //при (1) = не показывать сам документ  	
	  
		//ТОЛЬКО с этими 2 параметрами будет работать https:// ...
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);//отмена проверок
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);//
	  
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
	   
		//редиректы
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1); //авто refer если был редирект "location:"
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); //следовать ли "location:"
		curl_setopt($ch, CURLOPT_MAXREDIRS, 1); //макс редиректов по "location:"
	  
		
		
		//вывести перем в глобальные
		$curl_user_agent = 'Mozilla/5.0 (Windows NT 6.3; Win64; x64)' ; //  // AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36';
		curl_setopt($ch, CURLOPT_USERAGENT, $curl_user_agent);
		
		
		
	  $headers = [
		'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
		'Accept-Language: ru,en-us;q=0.7,en;q=0.3',
		'Accept-Encoding: deflate',   //грузит
		'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7'] ;
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); //указываем заголовок для отправки

		  
		//curl_setopt($ch, CURLOPT_REFERER, $main_domain);//рефер для моего хедера
	  
		#curl_setopt($ch, CURLOPT_COOKIEJAR, "elib_cookie.txt");//т к CURLOPT_USERAGENT
		#curl_setopt($ch, CURLOPT_COOKIEFILE,"elib_cookie.txt");
	  
	  
		curl_setopt ($ch , CURLOPT_PROXY, $PROXY_IP);
	  
	  
		$html = curl_exec($ch);    //html код страницы
	  
		if( curl_errno($ch) )
		{
			echo "<br>CURL proxy ошибка номер: ".curl_errno($ch)." - ".curl_error($ch);
			$this -> SHD_Current_HTML = "DOWNLOAD_ERROR";
			return;
		}
		
		curl_close($ch);
		
		
		
		$this -> SHD_Current_HTML = str_get_html( $html );
	}


	function D__DOWNLOAD_WITH_CURL_AUTH()
	{
	} 
	// С авторизацией  https://stackoverflow.com/questions/2742654/using-php-download-file-from-a-given-url-by-passing-username-and-password-for-ht


	#ДЛЯ VPN   CURLOPT_INTERFACE  Имя используемого сетевого интерфейса. Может быть именем интерфейса, IP адресом или именем хоста.
	
	
	#############################################################
	
	
	#############################################################
	
	
	#############################################################
	
	
	
}#END CLASS

		
		
?>