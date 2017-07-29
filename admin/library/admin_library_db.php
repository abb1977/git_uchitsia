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
	$str = "SELECT $columns FROM $table";
	if($where){$str = $str." WHERE $where";}
	if($order_by){$str = $str." ORDER BY $order_by";}
	//if($desc){$str = $str." DESC";}
	$select = mysqli_query($link,  $str);
	//echo "<p>$str</p>";
	return $select;
	}
//Конец функции выбора из БД данных


//Функция выбора из БД данных
function select_full_DB($link, $table, $columns, $where, $order_by, $limit, $desc){
	$str = "SELECT $columns FROM $table";
	if($where){$str = $str." WHERE $where";}
	if($order_by){$str = $str." ORDER BY $order_by";}
	if($desc){$str = $str." LIMIT $limit";}
	if($desc){$str = $str." DESC";}
	$select = mysqli_query($link,  $str);
	//echo "<p>$str</p>";
	return $select;
	}
//Конец функции выбора из БД данных



//Функция перезаписи  БД 
function updateDB($link, $table, $columns, $massData , $where){
	//$columns - поля БД перечисленные через запятую
	//$data - данные полей БД в массиве
	$massColumns=explode(",", $columns);
	$str = "UPDATE $table SET ";
	for ($i=0;$i<count($massColumns);$i++){
		$str.=trim($massColumns[$i]," \n")." = '".trim($massData[$i]," \n")."'";
		if($i<count($massColumns)-1){$str.=",";}
		$str.=" ";
	}
	if($where){$str = $str." WHERE $where";}
	  // echo "<p>$str</p>";
	// exit;
	$update = mysqli_query($link,  $str);
	
	return $update;
	}
//Конец функции перезаписи БД 

//Функция удаления строк из БД данных
function deleteDB($link, $table, $where){
	$str = "DELETE FROM $table WHERE $where";
	
	$delete = mysqli_query($link,  $str);
	//echo "<p>$str</p>";
	return $delete;
	}
//Конец функции удаления строк из БД

//Функция создание БД
function createDB($link, $table, $database_fields){
	$str = "CREATE TABLE $table $database_fields";
	
	$create_table = mysqli_query($link,  $str);
	//echo "<p>$str</p>";
	return $create_table;
	}
//Конец функции создания БД

//Функция удаления таблицыБД
function dropDB($link, $table){
	$str ="DROP TABLE $table";
	$drop_table = mysqli_query($link,  $str);
	//echo "<p>$str</p>";
	return $drop_table;
	}
//Конец функции удаления таблицы БД


//Функция возвращает массив со строкой из выборки БД. Повторное повторение этой функции берет следующую строчку
function fech_array($select, $parameter){
	
	if (!$parameter){ 
		$template_massive = mysqli_fetch_array($select);//Поля шаблона в массиве 
	}
	if ($parameter=="MYSQLI_NUM"){ 
		$template_massive = mysqli_fetch_array($select, MYSQLI_NUM);//Поля шаблона в массиве 
	}
	if ($parameter=="MYSQLI_ASSOC"){ 
		$template_massive = mysqli_fetch_array($select, MYSQLI_ASSOC);//Поля шаблона в массиве 
	}
	return $template_massive;
}
//Конец функции возвращения массива со строкой из выборки БД  

//Функция подсчета строчек таблицы БД
function countDB($link, $table, $where){
	$str ="SELECT COUNT(*) FROM $table";
	if($where){$str = $str." WHERE $where";}
	$count_table = mysqli_query($link,  $str);
	//echo "<p>$str</p>";
	return $count_table;
	}
//Конец функции подсчета строчек таблицы БД
       