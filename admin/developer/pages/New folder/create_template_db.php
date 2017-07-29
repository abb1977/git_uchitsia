<?php
//СОЗДАЁТ НОВЫЙ ШАБЛОН И ЗАПОЛНЯЕТ ДАННЫЕ О НОВОМ ШАБЛОНЕ В БАЗУ ДАННЫХ
include "../library/admin_library_db.php";
include "../library/admin_config.php";
//print_r($_POST);

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
 $height_content = $height_page;
 if(!$visible_header){$height_content-=$height_header;}
 if(!$visible_footer){$height_content-=$height_footer;}
 $height_content = $height_content."px";

?>
<!DOCTYPE html>
 <html>
     <head>
        <title>Создание страницы</title>
        <meta charset="utf-8" />
        <meta name="author" content="Барышников Андрей Борисович" />
        <meta name="description" content="О сайте." />
        <meta name="keywords" content="ключевые, слова, CSS" />
        <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="css/main.css"/>
    </head>
	<body>
		<!-- Начало страницы -->
		<div id="page">
        <?php
			//Запись полей в БД страниц
            $link = podkluchenieBD($domain, $login, $pass, $database); //Подключаемся к БД
			
			//Список всех переменных для запросов таблицы $db_table_01
			$valuesDB = "'$name_template',
						'$width_page',
						'$height_page',
						'$css_href_main',
						'$main_css_code',
						'$js_href_main',
						'$main_javascript_code',
						'$width_header',
						'$height_header',
						'$visible_header',
						'$width_leftColumn',
						'$height_leftColumn',
						'$visible_leftColumn',
						'$width_rightColumn',
						'$height_rightColumn',
						'$visible_rightColumn',
						'$width_footer',
						'$height_footer',
						'$visible_footer',
						'$width_content',
						'$height_content'";
			//Конец списка всех переменных для запросов таблицы $db_table_0
			$siteTemplate = insertDB($link, $db_table_01, $columnsDB_01, $valuesDB);//Вводим данные в БД
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
		
		?>
		</div>
		<!-- Конец страницы -->
	</body>
</html>



