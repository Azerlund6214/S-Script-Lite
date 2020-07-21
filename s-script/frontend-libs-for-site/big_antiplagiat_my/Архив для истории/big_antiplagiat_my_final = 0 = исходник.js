
//http://blogprogram.ru/zapretit-nazhatie-pravoj-knopki-myshi-na-sajte/
//Попытайтесь в этом примере выделить текст, нажать правую кнопку мыши или комбинации клавиш: Ctrl + A и Ctrl + U и Ctrl + S. Если ничего не сработает, значит скрипт работает

/* За основу взят скрипт по ссылке выше и ОЧЕНЬ сильно переписан */
/* 140420 2130 - 150420 0042 */

/*
Запреты:

ПКМ не работает (так и надо)

Клавиши:
Ctrl+A
Ctrl+S
Ctrl+U = Запрет view-code
Ctrl+C = Чтоб нельзя было скопировать абзац не двигая мышкой (робит)
Ctrl+I(+Shift) = запрет инспектора 1 (хтмл)
Ctrl+J(+Shift) = запрет инспектора 2 (консоль)
F12 запрещена

Выделение текста + оно сразу сбрасывается
(Сброс при движении мышки, можно выделить абзац нажав 3 раза и не двигая)(но копирование запрещено)


коды всех клавиш
https://keycode.info/
годное https://qna.habr.com/q/367617
всякий код https://progi.pro/obrabotka-sobitiy-nazhatiya-klavish-f1-f12-s-ispolzovaniem-javascript-i-jquery-kross-brauzer-7261536


ОБХОДЫ:
1) Можно просто отключить JS (Вкладка Source - F8)
2) Сделать все команды через верхнее меню браузера
3) view-source:САЙТ (но там хрен что разберешь если ты не админ и не прогер)
4) Некоторые клавиши работают во время показа алерта (Точно: Ctrl+S и F12)


Возможные Косяки:
1) В IE5 может не работать
2) На MAC другие сочетания клавиш (CMD иместо Ctrl)

меню пкм редачить нельзя, только оключить либо писать с 0



можно добавить клавишу ALT

в свитче можно сделать js-переход на отдельную страницу с поздравлениями на 100 круге

*/

// #####################################################
// ############################

	// Теги, где запреты не работают
	var key_throw_tags = "/INPUT|TEXTAREA/i"; //Как было

	var sel_killer_active = true; // Запрет выделения
	var key_killer_active = true; // Запрет кнопок
	var pkm_killer_active = true; // Запрет ПКМ

// #####################################################

	var key_count_pressed = 1; //Какое сейчас нажатие
	var bool_echo_key_msg = true; // Выводить ли алерты для клавиш
	var key_blocked =
	{ 
		// код : [спец клавииши , алерт]
		"83" : ["ctrl", "YOU SHALL NOT SAVE!!!"], // S
		"65" : ["ctrl", "Нет"], // A
		"85" : ["ctrl", "Ай-яй-яй, нехорошо..."], // U
		"67" : ["ctrl", "Плагиатить нехорошо :("], // C
		"80" : ["ctrl", "Бумага закончилась"], // P
		"73" : ["ctrl+shift", "Мдааа..."], // I
		"74" : ["ctrl+shift", "О, мало кто знает эту комбинацию, ... моё уважение))."], // J
		"123": ["none", "Думал будет так просто?"], // F12
		
		"20":["ctrl+shift", "Доказательство авторства 1:\nЕсли вы это читаете, то комбинацию вам сказал автор проекта.\n"],// CapsLock
		"8" :["ctrl+shift", "Доказательство авторства 2:\nЕсли вы это читаете, то комбинацию вам сказал автор проекта.\n"] // Backspace
		
		// Спец ==> none = ctrl = shift = ctrl+shift
		// Алерт => none = "" = "Текст"
		// Для отключения комментить элемент
		// НЕ ЗАБЫВАТЬ ЗАПЯТЫЕ!!!!
	}

// ############################
// #####################################################
// ############################

// Для обоих функций
function addHandler(element, event, handler)
{
	if (element.attachEvent)
		element.attachEvent('on' + event, handler);
	else
	if (element.addEventListener) 
		element.addEventListener(event, handler, false);
}



//запрещает выделение мышкой
function preventSelection(element)
{
	var preventSelection = false;

	// Убирает выделение
	function removeSelection()
	{
		if (window.getSelection)
			window.getSelection().removeAllRanges();
		else
		if (document.selection && document.selection.clear)
			document.selection.clear();
	}
	
	
	
	//запрещаем выделять текст мышкой
	// Сброс выделения = при движении
	addHandler(element, 'mousemove', function(){ if(preventSelection) removeSelection(); });

	// Сброс выделения =
	addHandler(element, 'mousedown', function(event)
		{
			var event = event || window.event;
			var sender = event.target || event.srcElement;
			preventSelection = !sender.tagName.match(key_throw_tags) ;
		});
  }


// ###########################
// ######################################################
// ###########################


//запрещает комбинации клавиш 
function preventKeys(element)
{
	//запрещаем нажатие клавищ
	function killCtrlA(event)
	{
		
		var event = event || window.event;
		var sender = event.target || event.srcElement;

		if (sender.tagName.match(key_throw_tags)) return;

		var key = event.keyCode || event.which; // A=65, F=70 и тд (цифровой код)
		//var code = String.fromCharCode(event.keyCode);
		//alert(code);

		// ########

		var is_ctrl  = event.ctrlKey;
		var is_shift = event.shiftKey;
		var pressed_spec_keys = "none";

		if ( is_ctrl )  pressed_spec_keys = "ctrl";
		if ( is_shift ) pressed_spec_keys = "shift";
		if ( is_ctrl && is_shift )  pressed_spec_keys = "ctrl+shift";
		//alert( pressed_spec_keys );
		//alert( key );

		// ########

		// Клавиша запретна, но возможно сочетание
		if ( key in key_blocked)
		{
			//alert(key+"=клавиша есть в запретном массиве");
			
			// Нажата цкавиша + есть нужные спец клавиши
			if ( pressed_spec_keys == key_blocked[key][0] )
			{
				//alert(key+"=Спец клавиши нажаты(или не нужны) - обрубаю действие");
				
				if ( bool_echo_key_msg ) // Вывод разрешен
					if ( key_blocked[key][1] !== "none" && key_blocked[key][1] !== "" ) // Текст есть
					{
						//Особые сообщения для настырных и неугомонных
						switch(key_count_pressed)
						{
							case  5: alert("Ээммм, привет..."); break;
							case 10: alert("Хватит тыкать!"); break;
							case 15: alert("Не надоело?"); break;
							case 20: alert("Может хватит?"); break;
							case 25: alert("Прекрати!"); break;
							case 30: alert("ЗАЧЕМ? Просто скажи мне ЗАЧЕМ????"); break;
							case 35: alert("О привет, а я тебя знаю.mp3"); break;
							case 40: alert("Это последнее сообщение, дальше ничего не будет. Я предупредил..."); break;
							case 70: alert("Еще чуть-чуть..."); break;
							case 85: alert("Мне было лень придумывать фразу, поэтому сайчас она здесь."); break;
							case 99: alert("Либо ты все-таки открыл инспектор и подправил переменную, либо ты читаешь это в коде, либо тебе совсем нечего делать."); break;
							case 999: alert("Ты 100% открыл исходный код скрипта, привет коллегам-айтишникам)))"); break;
							default:  alert( key_blocked[key][1] + "   (" + key_count_pressed + " раз)");
						}
						
						key_count_pressed++;
					}
				
				// Что происходит после нажатия клавиши
				if (event.preventDefault)
					event.preventDefault();
				else
					event.returnValue = false;
				
			}//end нажата запретная клавиша + её спец
		}//end нажата запретная клавиша
	
	}// end killCtrlA
	
	
	addHandler(element, 'keydown', killCtrlA);
	addHandler(element, 'keyup', killCtrlA);
}




// Вызываем все итоговые функцию

if( sel_killer_active ) preventSelection(document);

if( key_killer_active ) preventKeys(document);

if( pkm_killer_active ) document.oncontextmenu = cmenu; function cmenu() { return false; }
//запрещает нажатие правой кнопки мыши на сайте


/* END */