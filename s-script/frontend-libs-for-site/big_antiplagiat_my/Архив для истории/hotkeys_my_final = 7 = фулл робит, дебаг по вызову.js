/*
150420

CapsLock + ?


1 = Поиск и всякое
G - google
Y - yandex
T+5 - яндекс переводчик
T+6 - гугл переводчик



2+ ? = Хостинги
F - fozzy (везде страницы входа)
C - cloudflare
H - Hostinger


3 = Для кода
O - php.su
P - php.net
Потом = https://keycode.info/



4+? = Платежки (Вход)
M = перф мон
P = пейер
W = WebMoney
Q = Qiwi

Авторство:
1 = Caps + Q W E
2 = Caps + I O P
3 = Caps + G 6


потом все это обфусцировать




*/

//alert(pressed123.join('\n'));

	var arr_keys_pressed = new Array(); //[]   new Array();
	
	

	var arr_keys_comb =
	[
		[ ["KeyA","KeyS"] , function(){ alert("12345as!"); } ],
		
		
		[ ["CapsLock","Digit1","KeyY"] , function(){ window.open("https://yandex.ru/", "_blank"); } ],
		[ ["CapsLock","Digit1","KeyG"] , function(){ window.open("https://www.google.com/", "_blank");} ],
		[ ["CapsLock","Digit1","KeyT","Digit5"] , function(){ window.open("https://translate.yandex.ru/", "_blank");} ],
		[ ["CapsLock","Digit1","KeyT","Digit6"] , function(){ window.open("https://translate.google.com/", "_blank");} ],
		
		
		[ ["CapsLock","Digit3","KeyO"] , function(){ window.open("http://www.php.su/", "_blank");} ],
		[ ["CapsLock","Digit3","KeyP"] , function(){ window.open("http://www.php.net/", "_blank");} ],
		
		
		[ ["CapsLock","Digit2","KeyF"] , function(){ window.open("https://accounts.fozzy.com/clientarea.php", "_blank");} ],
		
		// ################
		
		[ ["CapsLock","KeyA","KeyS"] , function(){ antiplag_debug_start(); alert("HotKeys Debug START!!!"); } ],
		[ ["CapsLock","KeyA","KeyE"] , function(){ antiplag_debug_end(); alert("HotKeys Debug END!!!"); } ],
		
		// ################
		
		[ ["ControlLeft","KeyS"] , function(){ KeyKiller(event); alert("YOU SHALL NOT SAVE!!!"); } ],
		[ ["ControlLeft","KeyA"] , function(){ KeyKiller(event); alert("Нет"); } ],
		[ ["ControlLeft","KeyU"] , function(){ KeyKiller(event); alert("Ай-яй-яй, нехорошо..."); } ],
		[ ["ControlLeft","KeyC"] , function(){ KeyKiller(event); alert("Плагиатить нехорошо :("); } ],
		[ ["ControlLeft","KeyP"] , function(){ KeyKiller(event); alert("Бумага закончилась"); } ],
		[ ["ControlLeft","KeyI","ShiftLeft"] , function(){ KeyKiller(event); alert("Мдааа..."); } ],
		[ ["ControlLeft","KeyJ","ShiftLeft"] , function(){ KeyKiller(event); alert("О, мало кто знает эту комбинацию...))."); } ],
		[ ["F12"] , function(){ KeyKiller(event); alert("Думал будет так просто?"); } ],
		
		// ################
		
		[ ["CapsLock","KeyQ","KeyW","KeyE"] , function()
			{ alert("Доказательство авторства 1/8:\nЕсли вы это читаете, то комбинацию вам сказал автор проекта.\n");} ],
		[ ["CapsLock","KeyI","KeyO","KeyP"] , function()
			{ alert("Доказательство авторства 2/8:\nЕсли вы это читаете, то комбинацию вам сказал автор проекта.\n");} ],
		[ ["CapsLock","KeyG","Digit6"] , function()
			{ alert("Доказательство авторства 3/8:\nЕсли вы это читаете, то комбинацию вам сказал автор проекта.\n");} ]
		
	];
	// ShiftLeft ControlLeft AltLeft    Digit1 KeyA
	
	
	// Тут 2 массив и по ифу он мержится с основным
	
	
	//pressed123[0][2]();
	//alert(pressed123[i][0].join('\n'));

	
	
	// ########################
	// ### Вывод массива на экран
	// /*
		
		var antiplag_debug_active = false;
		
		// Создает тег(робит)
		function antiplag_debug_start( )
		{
			let div1 = document.createElement('div');
			div1.id = "antiplag";
			div1.style = "position: fixed; z-index: 100; bottom: 10px; left: 30px; color: red; font-size:32px;";
			document.body.append(div1);
		
			antiplag_debug_active = true;
		}
		
		// Удаляет тег(робит)
		function antiplag_debug_end( )
		{
			document.getElementById("antiplag").remove();
			antiplag_debug_active = false;
		}
		
		
		// */
		
		function debug_refresh_antiplag_div( )
		{
			// return; //Для отключения
			// Вызывается в обработчиках нажатия и отпуска
			if ( antiplag_debug_active === true )
				document.getElementById('antiplag').innerHTML = "Keys = " + arr_keys_pressed;
		}
		
	// ########################
	
	
	
	
	function check_combinations(event)
	{
		
		
		if( Is_Throwed_Tag(event) )
			return;
		
		
		//console.clear();
		
		//console.log( "################################# check_combinations" );
		//console.log( "Проверка сочетаний = Нажаты 2+ кнопки: " + arr_keys_pressed );
		
		var keys_has_combo = false; // Есть ли для этих клавиш комбинация
		var keys_has_combo_i = -1; // Номер элемента с совпадением
		
		for (let i = 0; i < arr_keys_comb.length; i++)
		{
			//console.log( "##### FOR => i="+ i +" => arr_keys_comb[i][0] = " + arr_keys_comb[i][0] );
			
			
			if ( arr_keys_comb[i][0].length != arr_keys_pressed.length )
			{
				//console.log("i="+ i +" => Размеры НЕ одинаковы - continue = ");
				continue;
			}
			
			//console.log("Размеры одинаковы.");
			
			/*
			console.log("Массив комб  => " + arr_keys_comb[i][0] );
			console.log("Массив press => " + arr_keys_pressed );
			console.log("Сортировка.");
			*/
			
			arr_keys_comb[i][0].sort();
			arr_keys_pressed.sort();
			
			
			/*
			console.log("Массив комб  => " + arr_keys_comb[i][0] );
			console.info( arr_keys_comb[i][0] );
			console.log("Массив press => " + arr_keys_pressed );			
			console.info( arr_keys_pressed );
			
			console.info( arr_keys_comb[i][0] );
			console.info( arr_keys_pressed );
			*/
			
			
			
			
			
			
			for (let k = 0; k < arr_keys_comb[i][0].length; k++)
			{
				var key1 = arr_keys_comb[i][0][k] ;
				var key2 = arr_keys_pressed[k] ;
				
				/*
				console.log("k = " + k );
				console.log("Key1 = " + key1 );
				console.log("Key2 = " + key2 );
				*/
				
				if( key1 != key2 )
				{
					//console.log("Клавиши не одинаковы");
					break; // эта строка не подходит
					//continue;
				}
				
				
				// Прошли все циклы по каждой клавише и все норм
				if( k === arr_keys_comb[i][0].length - 1 )
				{
					//console.log("!! Клавиши одинаковы - break = do action");
					keys_has_combo = true;
					keys_has_combo_i = i;
					break;
				}
				
			}
			
			
			if ( keys_has_combo )
			{
				break; // Нашли, идем дальше
			}
			
		}//End for
		
		// Если промотали все циклы и не нашли комбо
		if ( ! keys_has_combo )
			return;
		
		console.log("HotKeys = Вызвано комбо с i = " + keys_has_combo_i + " ==> " + arr_keys_comb[keys_has_combo_i][0] );
		
		// Действия		
		arr_keys_comb[keys_has_combo_i][1](event); // Вызываем функцию
		

		// При событии удалять все клавиши из массива
		arr_keys_pressed = [];

		
		
	}
	
	

	function on_keydown_event(event)
	{
		//console.log("=============begin on_keydown_event");
		//console.log(event);
		
		var key_downed = event.code;
		//console.log( "Нажата кнопка = " + key_downed );
		
		
		
		// Добавляю в массив
		
		var index = arr_keys_pressed.indexOf( key_downed );
		
		if (index > -1) // Если найдена
		{
			//console.log( "Кнопка = " + key_downed + " = Уже была в массиве - не добавляю" );
		}
		else
		{
			//console.log( "Кнопка = " + key_downed + " = Добавлена в массив" );
			arr_keys_pressed.push( key_downed );
			//arr_keys_pressed.splice(0, 0, key_downed );
			//console.log( "###########" );
			//console.info( arr_keys_pressed );
		}
		
		debug_refresh_antiplag_div();
		
		check_combinations();
		
		//debug_refresh_antiplag_div(); // специально не ставлю - иначе сбрасывает посл клавишу комбы

	}//End event
	
	
	function on_keyup_event(event)
	{
		
		var key_upped = event.code;
		//console.log( "ОТжата кнопка = " + key_upped );
		
		
		
		// Удаляю из массива
		
		var index = arr_keys_pressed.indexOf( key_upped );

		if (index > -1) // Если найдена
		{
			//console.log( "Кнопка = " + key_upped + " = Удалена из массива" );
			arr_keys_pressed.splice(index, 1);	
		}
		else
		{
			//console.log( "Кнопка = " + key_upped + " = Отжата, но не найдена в массиве" );
		}
		
		debug_refresh_antiplag_div();
		
	}//End event
/*
*/
	
	// /*
	// Что происходит после нажатия запрещенной клавиши
	function KeyKiller(event)
	{
		if (event.preventDefault)
			event.preventDefault();
		else
			event.returnValue = false;
	}
	// */
	

	
	document.addEventListener( 'keyup',   function(event) { on_keyup_event(event);  } );
	
	document.addEventListener( 'keydown', function(event) { on_keydown_event(event);} );





	
/* end */