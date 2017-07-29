<?php
//РЕДАКТИРУЕТ ШАБЛОН И ЗАПОЛНЯЕТ ДАННЫЕ О ШАБЛОНЕ В БАЗУ ДАННЫХ
echo "<h1>Редактировать шаблон  $_POST[name_first]</h1>" ;

//Общие переменные шаблона
 $name_template = $_POST[name_template];//имя файла страницы. Имя PHP страницы в ftp
 if(!$name_template){$name_template="unknown";}
 $width_page =  $_POST[width_page]; //Ширина страницы"
 if(!$width_page){$width_page='1024px';}
 $height_page =  $_POST[height_page]; //Высота страницы
 if(!$height_page){$height_page='768px';}
// $css_template = $_POST[css_template];//Путь к CSS файлу шаблона
// $css_code_template =  $_POST[css_code_template]; //Код CSS
// $javaScript_template =  $_POST[javaScript_template]; //Путь к JS файлу шаблона
 //$javaScript_code =  $_POST[javaScript_code]; //Код javaScript
 $main_css_code =  $_POST[main_css_code]; //Строка содержащий CSS для всех страниц
 $main_javascript_code =  $_POST[main_javascript_code]; //Строка содержащий javaScript для всех страниц
 $css_href_main =  $_POST[css_href_main];//Путь CSS файла для всех страниц 
 $js_href_main =  $_POST[js_href_main];//Путь javaScript файла для всех страниц 
 //$css_href_main = $koren."/css/main_".$name_template.".css";//Полное имя CSS файла для всех страниц 
 //$js_href_main = $koren."/js/main_".$name_template.".js";//Полное имя javaScript файла для всех страниц 
  
 //Конец общих переменных шаблона 
  
  //Переменные  для хедера
 if($_POST[visible_header]==on){$visible_header=1;} else{$visible_header=0;}//Отключить хедер если 1
 $width_header =  $_POST[width_header]; //Ширина блока
 if(!$width_header){$width_header='100%';}
 $height_header =  $_POST[height_header]; //Высота блока
 if(!$height_header){$height_header='100px';}
 //конец переменных хедера

//Переменные левой колонки
 if($_POST[visible_leftColumn]==on){$visible_leftColumn=1;} else{$visible_leftColumn=0;}//Отключить хедер если 1
 $width_leftColumn =  $_POST[width_leftColumn]; //Ширина блока
 if(!$width_leftColumn){$width_leftColumn='200px';}
 $height_leftColumn =  $_POST[height_leftColumn]; //Высота блока
 if(!$height_leftColumn){$height_leftColumn='400px';}
 //конец переменных левой колонки
 
//Переменные правой колонки
 if($_POST[visible_rightColumn]==on){$visible_rightColumn=1;} else{$visible_rightColumn=0;}//Отключить хедер если 1
 $width_rightColumn =  $_POST[width_rightColumn]; //Ширина блока
 if(!$width_rightColumn){$width_rightColumn='200px';}
 $height_rightColumn =  $_POST[height_rightColumn]; //Высота блока
 if(!$height_rightColumn){$height_rightColumn='400px';}
//конец переменных правой колонки 
 
 //Переменные для подвала
if($_POST[visible_footer]==on){$visible_footer=1;} else{$visible_footer=0;}//Отключить хедер если 1
 $width_footer =  $_POST[width_footer]; //Ширина блока
 if(!$width_footer){$width_footer='100%';}
 $height_footer =  $_POST[height_footer]; //Высота блока
 if(!$height_footer){$height_footer='100px';}
//конец переменных для подвала
 $width_content = $width_page;
 if(!$visible_leftColumn){$width_content-=$width_leftColumn;}
 if(!$visible_rightColumn){$width_content-=$width_rightColumn;}
 $width_content = $width_content."px";
 $height_content = $height_page*1;
 if(!$visible_header){$height_content-=$height_header;}
 if(!$visible_footer){$height_content-=$height_footer;}
 $height_content = $height_content."px";
			//Запись полей в БД страниц
            $link = podkluchenieBD($domain, $login, $pass, $database); //Подключаемся к БД
			//Массив всех переменных для запросов таблицы $db_table_01
			$valuesMasDB=[];
			$valuesMasDB[0] = $name_template;
			$valuesMasDB[1] = $width_page;
			$valuesMasDB[2] = $height_page;
			$valuesMasDB[3] = $css_href_main;
			$valuesMasDB[4] = $main_css_code;
			$valuesMasDB[5] = $js_href_main;
			$valuesMasDB[6] = $main_javascript_code;
			$valuesMasDB[7] = $width_header;
			$valuesMasDB[8] = $height_header;
			$valuesMasDB[9] = $visible_header;
			$valuesMasDB[10] = $width_leftColumn;
			$valuesMasDB[11] = $height_leftColumn;
			$valuesMasDB[12] = $visible_leftColumn;
			$valuesMasDB[13] = $width_rightColumn;
			$valuesMasDB[14] = $height_rightColumn;
			$valuesMasDB[15] = $visible_rightColumn;
			$valuesMasDB[16] = $width_footer;
			$valuesMasDB[17] = $height_footer;
			$valuesMasDB[18] = $visible_footer;
			$valuesMasDB[19] = $width_content;
			$valuesMasDB[20] = $height_content;
			//Конец массива всех переменных для запросов таблицы $db_table_0
			$select_template_id = selectDB($link, $db_table_01, "id", " name_template='$_POST[name_first]'", false);//Выбор шаблона из БД
			$template_massive_id = fech_array($select_template_id, "MYSQLI_ASSOC");//Поля шаблона в массиве
			
			$id = $template_massive_id[id];
			$siteTemplate = updateDB($link, $db_table_01, $columnsDB_01, $valuesMasDB, "id=$id");//Вводим данные в БД
            //Конец записи в БД страниц
			
			if($siteTemplate){echo"Шаблон успешно сохранен";} else {echo"Ошибка!!! Шаблон не был сохранен";}
		
		//Создаем файл стилей для всех страниц
		eval($main_css_code);
		file_put_contents($koren.$css_href_main."main_".$name_template.".css", $textCode);
		//Конец создания файла стилей для всех страниц
		
		//Создаем файл JavaScript для всех страниц
$main_javascript_code ="
window.onload=function(){
	page_javascript();
	$main_javascript_code
};";
		file_put_contents($koren.$js_href_main."main_".$name_template.".js", $main_javascript_code);
		//Конец создания JavaScript стилей для всех страниц
