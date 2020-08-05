<?php
#261118
	
	
# Записывать в переменную "UN_TIMER"

# Миллисекунда (мс) — единица времени, равная одной тысячной доле секунды


class UNIV_PHP_TIMER
{
	
	public $Class_Name = "UNIV_PHP_TIMER";
	
	public $Timer_Name = "Default_Name";
	
	public $Time_Begin  = 0;
	public $Time_Paused = 0; # Сколько простояли в паузе(потом вычитается)
	
	public $Result = 0;
	public $State = "NOT STARTED";
	
	#############################################################
	
	function __construct( $Name = "Default_Name" )
	{
		#echo "<br> Создан класс ".$this->Class_Name; 
		
		$this->Timer_Name = $Name;
	}
	
	function __destruct() 
	{	
		#echo "<br> Уничтожается класс ".$this->Class_Name ;
	}
	
	#############################################################
	
	
	function Start()
	{
		$this->Time_Begin = microtime(true);
		
		#echo "<br>Begin=".$this->Time_Begin;
		
		$this->Time_Paused = 0;
		$this->State = "WORK";
	}
	
	
	
	function Set_Stop_Time() # Переименовать
	{
		$this->Result = microtime(true);	
		#echo "<br>Result=".$this->Result;
	}
	
	
	### ECHO   GET
	### sec min hrs ALL (Округление в большую)
	function Get_Time( $Format="sec" , $NeedEcho=false ) //Get_Delta
	{
		if($this->State === "NOT STARTED")
		{
			echo "<br>Таймер еще не запущен => return"; // Додумать
			return;
		}
		

		$Currrent_Result_ms = $this->Result - $this->Time_Begin - $this->Time_Paused;
		//echo "<br>Разница=".$Currrent_Result_ms;
		

		$msec = floor($Currrent_Result_ms/0.000001);
		$sec = (int) $Currrent_Result_ms;
		$min = (int)($Currrent_Result_ms/60);    # Можно убрать в case чтоб не считать все, когда нужно только 1 значение
		$hrs = (int)($Currrent_Result_ms/60/60);
		
		
		switch( $Format )
		{
			case "msec":
						if( $NeedEcho ) echo "<br>Таймер '$this->Timer_Name' = ".$msec."мсек" ;
						return $msec;
						
			case "sec":
						if( $NeedEcho ) echo "<br>Таймер '$this->Timer_Name' = ".$sec."сек" ;
						return $sec;
						
			case "min":
						if( $NeedEcho ) echo "<br>Таймер '$this->Timer_Name' = ".$min."мин" ;
						return $min;
						
			case "hrs":
						if( $NeedEcho ) echo "<br>Таймер '$this->Timer_Name' = ".$hrs."часов" ;
						return $hrs;
						
			case "all":
			case "ALL":
						# РАБОТАЕТ
						#$sec = (int) $Currrent_Result_ms;
						#$min = (int)($Currrent_Result_ms/60);
						#$hrs = (int)($Currrent_Result_ms/60/60);
						
						### Почти тоже, что и выше, но вычетаем время
						
						$Hours = (int)($Currrent_Result_ms/60/60);
						$Currrent_Result_ms -= $Hours*60*60;
						
						$Minutes = (int)($Currrent_Result_ms/60);	# Сделать через остатки от деления
						$Currrent_Result_ms -= $Minutes*60;
						
						$Seconds = (int) $Currrent_Result_ms;
						
						$msec =  floor($Currrent_Result_ms/0.000001)%1000000;
						
						echo "<br>Таймер '$this->Timer_Name' = ".$Hours."ч ".$Minutes."м ".$Seconds."с ".$msec."микросек" ;
						
						return;
						
			default: 
					echo "<br>ERROR";
					return "ERROR";

		}
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	function Pause()
	{
	
	}
	
	function Resume()
	{
	
	
	}
	

	function Restart()
	{
		//Убрать дефолты в конструктор
		//тут его вызов
	
	}

	
	####Время начала
	#		
	
	#$time_all = microtime(true) - $time_beg; //4.9908819198608
	#		echo "<br>Скачка HTML заняла ", $time_all , " Секунд"; #(integer)$time_all
	
	
	
	# $Time_End_Iteration = microtime(true) - $Time_Start_Iteration;
	
	#############################################################
	
	
	#############################################################
	
	
	#############################################################
	
	
	
}#END CLASS

		
		
?>