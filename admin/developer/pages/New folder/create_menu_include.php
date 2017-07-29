<?php
header("Content-Type: text/html; charset=utf-8");
//СОЗДАЁТ МЕНЮ ДЛЯ ФУНКЦИИ INCLUDE И ЗАПИСЫВАЕТ ДАННЫЕ О МЕНЮ В БАЗУ ДАННЫХ
include "../library/admin_library_db.php";
include "../library/admin_config.php";
include "../library/admin_library.php";

$link = podkluchenieBD($domain, $login, $pass, $database); //Подключаемся к БД
			
$add = "../"; //дополнение к ссылке
//Создаем переменные
$name_menu =  $_POST[name_menu]; //Имя меню
$type_menu =  $_POST[type_menu]; //Тип меню
$items_menu =  $_POST[items_menu]; //Строки с пунктами меню и ссылками
$class_menu =  $_POST[class_menu]; //Атрибут class для внешнего тега UL
$javaScript_code_menu =  $_POST[javaScript_code_menu]; //код CSS для меню. Код хранится здесь, но пока будет вводится вручную в файл шаблона
$css_code_menu =  $_POST[css_code_menu]; //код javaScript для меню. Код хранится здесь, но пока будет вводится вручную в файл шаблона
//Конец создания переменных

//Создаем файл HTML кода для меню (Создает многоуровневый список)
include("../include_admin/htmlMenu.php");
//Конец создания файла стилей HTML кода для меню

?>
<!DOCTYPE html>
 <html>
     <head>
        <title>Создание меню</title>
        <meta charset="utf-8" />
        <meta name="author" content="Барышников Андрей Борисович" />
        <meta name="description" content="О сайте." />
        <meta name="keywords" content="ключевые, слова" />
        <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="css/main.css"/>
    </head>
	<body>
		<!-- Начало страницы -->
		<div id="page">
        <?php
			//Запись полей в БД страниц
			//Переменные для запроса записи в БД страницы
			$valuesDB_03 = "'$name_menu',
							'$type_menu',
							'$items_menu',
							'$class_menu',
							'$javaScript_code_menu',
							'$css_code_menu'";
			//Конец переменных для запроса в БД страницы
           $siteMenu = insertDB($link, $db_table_03, $columnsDB_03, $valuesDB_03);//Вводим данные в БД
           //Конец записи в БД страниц
			if($siteMenu){echo"Меню в БД сохранено успешно";} else {echo"Ошибка!!! Меню в БД не было сохранено";}
			?>
		</div>
		<!-- Конец страницы -->
	</body>
</html>



