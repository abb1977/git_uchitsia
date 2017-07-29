<?php
//Функция подключения к БД
function podkluchenieBD($domain, $login, $pass, $database){
	$link = mysqli_connect($domain, $login, $pass) OR DIE("Не могу создать соединение ");	
	mysqli_select_db($link, $database) or die("Не могу выбрать базу данных ");
	return $link;
	}
//Конец функции подключения к БД

//Функция ввода данных в БД
function insertDB($link, $table, $columns, $values){
	$insert = mysqli_query($link,  "INSERT INTO $table ($columns) VALUE ($values)");
	//echo "<p>INSERT INTO $table ($columns) VALUE ($values)</p>";
	return $insert;
	}
//Конец функции ввода в БД

//Функция выбора из БД данных
function selectDB($link, $table, $columns, $where, $order_by){
	$str = "SELECT $columns FROM $table WHERE $where";
	if($order_by){$str." ORDER BY $order_by";}
	$select = mysqli_query($link,  $str);
	//echo "<p>$str</p>";
	return $select;
	}
//Конец функции выбора из БД данных

//Функция возвращает массив со строкой из выборки БД. Повторное повторение этой функции берет следующую строчку
function fech_array($select, $parameter){
	//if (!$parameter){$param = "MYSQLI_BOTH";} 
	$template_massive = mysqli_fetch_array($select);//Поля шаблона в массиве 
	return $template_massive;
}
//Конец функции возвращения массива со строкой из выборки БД         