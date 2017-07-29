<?php
header("Content-Type: text/html; charset=utf-8");
//СОЗДАЁТ НОВУЮ СТРАНИЦУ И ЗАПОЛНЯЕТ ДАННЫЕ О НОВОЙ СТРАНИЦЕ В БАЗУ ДАННЫХ
include "../library/admin_library_db.php";
include "../library/admin_config.php";

$link = podkluchenieBD($domain, $login, $pass, $database); //Подключаемся к БД
			
//Переменные страницы
 $name_page = $_POST[name_page];//имя файла страницы. Имя PHP страницы в ftp
 if(!$name_page){$name_page="unknown";}
 $title = $_POST[title]; //Заголовок страницы
 if(!$title){$title="unknown";}
 $author = $_POST[author];	//автор сайта
 $description = $_POST[description]; //Информация о сайте
 $keywords =$_POST[keywords];//Ключевые слова через запятую
 $favicon =  $_POST[favicon]; //Полное имя файла иконки для сайта относительно корня
 $href_page = $_POST[href_page]; //Путь местонахождения страницы относительно корня
 $css_href_page = $_POST[css_href_page]; //Путь к CSS файлу для страницы относительно корня
 $pageCSS =  $_POST[pageCSS]; //Код CSS 
 $js_page = $_POST[js_page]; //Путь к файлу Javascript для страницы относительно корня
 $pageJavaScript =  $_POST[pageJavaScript]; //Код javaScrbgn
 $type_pages = $_POST[type_pages]; //Тип страницы
 $name_template =  $_POST[name_template]; //Имя шаблона
 $php_content =  $_POST[php_content]; //Код PHP, который будет в контенте страницы
 $include_folder =  $_POST[include_folder]; //Путь к папке в которой хранятся системные файлы, которые инклюдятся
// Конец переменных страницы

//Выбор полей базы данных шаблона страницы
$select_template = selectDB($link, $db_table_01, $columnsDB_01, "name_template='$name_template'", false);//Выбор шаблона из БД
$template_massive = fech_array($select_template, "MYSQLI_ASSOC");//Поля шаблона в массиве
//Конец выбора полей базы данных шаблона страницы

//Создание PHP кода страницы 
include("../include_admin/createPHP.php");
//Конец создания PHP кода

//Создаем файл стилей для страницы
file_put_contents($koren.$template_massive[css_href_page].$name_page.".css", $pageCSS);
//Конец создания файла стилей для всех страниц

//Создаем файл javaScript для страницы
$main_javascript_code ="
function page_javascript(){
	$pageJavaScript
	};";
file_put_contents($koren.$template_massive[js_href_main].$name_page.".js", $main_javascript_code);
//Конец создания файла javaScript для всех страниц
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
			//Переменные для запроса записи в БД страницы
			$valuesDB_02 = "'$name_page', 
							'$title',
							'$author',
							'$description',
							'$keywords',
							'$favicon',
							'$href_page',
							'$css_href_page',
							'$pageCSS',
							'$js_page',
							'$pageJavaScript',
							'$type_pages',
							'$name_template',
							'$php_content',
							'$include_folder'";
			//Конец переменных для запроса в БД страницы
           $sitePages = insertDB($link, $db_table_02, $columnsDB_02, $valuesDB_02);//Вводим данные в БД
           //Конец записи в БД страниц
			if($sitePages){echo"Страница в БД сохранена успешно";} else {echo"Ошибка!!! Страница в БД не была сохранена";}
			
           ?>
		</div>
		<!-- Конец страницы -->
	</body>
</html>



