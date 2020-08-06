<?php

# ХОСТИНГ = В начале путей php include не должно быть слеша (иначе 500) !!!!!!!!!!
# ХОСТИНГ = Недопустимая конструкция в HTML  <--### ...   Это ключевое слово для PHP SSI = <--# include 123 -->
# ХОСТИНГ = Всегда прверять логи с сервера, там все ошибки
# ХОСТИНГ = 
# ХОСТИНГ = 

$pre_html_start_time = microtime(true); # таймер для скрипта

include "project/project_index.php";


echo "<hr>End main index";
?>