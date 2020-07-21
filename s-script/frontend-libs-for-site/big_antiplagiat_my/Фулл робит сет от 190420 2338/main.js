
//http://blogprogram.ru/zapretit-nazhatie-pravoj-knopki-myshi-na-sajte/
//Попытайтесь в этом примере выделить текст, нажать правую кнопку мыши или комбинации клавиш: Ctrl + A и Ctrl + U и Ctrl + S. Если ничего не сработает, значит скрипт работает

/* За основу взят скрипт по ссылке выше и ОЧЕНЬ сильно переписан */
/* 140420 2130 - 150420 0042 v1    фулл финал 190420 (фулл унив, 4 файла) */


/*

коды всех клавиш
https://keycode.info/
годное https://qna.habr.com/q/367617
всякий код https://progi.pro/obrabotka-sobitiy-nazhatiya-klavish-f1-f12-s-ispolzovaniem-javascript-i-jquery-kross-brauzer-7261536


ОБХОДЫ:
0) !!! Юзать правый CTRL и Shift (РОБИТ все, кроме F12, но там своя обходка)
1) Сделать все команды через верхнее меню браузера
2) Некоторые клавиши работают во время показа алерта (Точно: Ctrl+S и F12)
3) Любая клавиша + F12   откроет инспектор
4) Можно просто отключить JS (Вкладка Source - F8)
5) view-source:САЙТ (но там хрен что разберешь если ты не админ и не прогер)

Возможные Косяки:
1) В IE5 может не работать
2) На MAC другие сочетания клавиш (CMD иместо Ctrl)

меню пкм редачить нельзя, только оключить либо писать с 0

Выделение работает на голом тексте без оберток div (Заглушка 3=MAIN-4)


Скрипт грузится внизу боди - до этого все можно копировать и тд (но будет мешать прелоадер)

*/

// #####################################################
// ############################

	// Теги, где запреты не работают
	var key_throw_tags = "INPUT|TEXTAREA|I"; //Как было "/INPUT|TEXTAREA/i"  !!! Обязательно капсом
	
	var sel_killer_active = true; // Запрет выделения
	var key_killer_active = true; // Запрет кнопок
	var pkm_killer_active = true; // Запрет ПКМ
	var add_source_active = true; // Добавка источника к скопированному
	
	var echo_combo_in_log = false; // Выводить инфу о комбо в лог

	// Можно сделать их отключение как у дебага массива (ВСЕХ СРАЗУ, иначе не получится)

// ############################
// #####################################################
// ############################

//console.log();

if( pkm_killer_active ) document.oncontextmenu = cmenu; function cmenu() { return false; }
//запрещает нажатие правой кнопки мыши на сайте


// РОБИТ
// Унив функция проверки тега на разрешенность
function Is_Throwed_Tag(event)
{
	//console.log( "Masc = " + key_throw_tags );

	var event  = event || window.event;
	
	var sender = event.target || event.srcElement;
	var sender_tag = sender.tagName;
	//console.log( "Sender tag = " + sender_tag );
	
	
	var res = sender_tag.match(key_throw_tags) ;
	//console.log( "Res = " + res );
	
	
	if ( res === null ) // Лучше переписать через массив(оч много событий мышки)
	{	
		//console.log( sender_tag + " = Тег НЕ допустим: " + res );
		return false; //none
	}
	
	//console.log( sender_tag + " = Тег допустим: " + res );
	return true;
		
}






/* End */