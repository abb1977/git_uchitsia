<?php
include "$koren/admin/library/admin_library.php";
$htmlMenu="<ul class='$class_menu'>\n";//HTML код для меню
$arr_menu=[];//Массив состоящий из строк
$arr_menu=explode("\n",$items_menu);
$ul=0;//число открывающих тегов
//print_r($arr_menu);
$arr_item=[];//массив с элементом меню и ссылкой
for ($i=0; $i<count($arr_menu);$i++){
	//echo($arr_menu[$i]);
		$arr_menu[$i]=trim($arr_menu[$i]);//удаляем пробелы
		$item = trim($arr_menu[$i],"#");//удаляем символы # и пробелы
		
		$layer = mb_strlen($arr_menu[$i])- mb_strlen($item);//количество символов #. Номер уровня меню
		//$item = trim($arr_menu[$i]);//Удаляем пробелы
		
		$arr_item = explode("|",$item);//отделяем элемент меню и ссылку в разные элементы массива
		$arr_item[0] = trim($arr_item[0]);//удаляем пробелы вначале и вконце
		$arr_item[1] = trim($arr_item[1]);//удаляем пробелы вначале и вконце
		//print_r($arr_item);
		if ($layer>$ul){
			$htmlMenu=insert_tab($ul,$htmlMenu);//Вставляем табуляции
			$ul++;
			$htmlMenu.="<ul>\n";//HTML код для меню
		}
		while ($layer<$ul){
			$ul--;
			$htmlMenu=insert_tab($ul,$htmlMenu);//Вставляем табуляции
			$htmlMenu.="</ul>\n";//HTML код для меню
			
		}
		$htmlMenu=insert_tab($ul,$htmlMenu);//Вставляем табуляции
		$htmlMenu.="<li><a href='".'<?php $_SERVER["DOCUMENT_ROOT"]?>'."$arr_item[1]'>$arr_item[0]</a></li>\n";//HTML код для меню
	}
	for ($i=0; $i<=$ul;$i++){
		$htmlMenu=insert_tab($ul-$i-1,$htmlMenu);//Вставляем табуляции
		$htmlMenu.="</ul>\n";//HTML код для меню
	}

file_put_contents("$koren/menu/$name_menu.php", $htmlMenu);