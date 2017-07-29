<?php
//СОЗДАЁТ НОВУЮ СТРАНИЦУ И ЗАПОЛНЯЕТ ДАННЫЕ О НОВОЙ СТРАНИЦЕ В БАЗУ ДАННЫХ
include "$koren/admin/library/admin_library_db.php";
include "$koren/admin/library/admin_config.php";

$link = podkluchenieBD($domain, $login, $pass, $database); //Подключаемся к БД
//Переменные страницы
 $name_page = $_POST[name_page];//имя файла страницы. Имя PHP страницы в ftp
 if(!$name_page){$name_page="unknown";}
 $title =  $_POST[title]; //Заголовок сайта
 $favicon =  $_POST[favicon]; //Полное имя файла иконки для сайта относительно корня
 
 $href_page = $_POST[href_page]; //Путь местонахождения страницы относительно корня
 $pageCSS =  $_POST[pageCSS]; //Код CSS 
 $pageJavaScript =  $_POST[pageJavaScript]; //Код javaScrbgn
 $name_template =  $_POST[name_template]; //Имя шаблона
 $php_content =  $_POST[php_content]; //Код PHP, который будет в контенте страницы
 $include_folder =  $_POST[include_folder]; //Путь к папке в которой хранятся системные файлы, которые инклюдятся
// Конец переменных страницы

//Выбор полей базы данных шаблона страницы
$select_template = selectDB($link, $db_table_01, $columnsDB_01, "name_template='$name_template'", false);//Выбор шаблона из БД
$template_massive = fech_array($select_template, "MYSQLI_ASSOC");//Поля шаблона в массиве
//Конец выбора полей базы данных шаблона страницы

//Создание PHP кода страницы 
include("$koren/admin/developer/include_admin/createPHP.php");
//Конец создания PHP кода
        //Запись полей в БД страниц
			//Переменные для запроса записи в БД страницы
			$valuesDB_admin = "'$name_page',
							'$title',
							'$favicon',
							'$href_page',
							'$pageCSS',
							'$pageJavaScript',
							'$name_template',
							'$php_content',
							'$include_folder'";
			//Конец переменных для запроса в БД страницы
           $sitePages = insertDB($link, $db_table_admin, $columnsAdmin, $valuesDB_admin);//Вводим данные в БД
           //Конец записи в БД страниц
			if($sitePages){echo"Страница в БД сохранена успешно";} else {echo"Ошибка!!! Страница в БД не была сохранена";}
			


