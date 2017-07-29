<?php
	header("Content-Type: text/html; charset=utf-8");
	$koren = $_SERVER["DOCUMENT_ROOT"]; //дополнение к ссылке
	include "$koren/admin/library/admin_library_db.php";
	include "$koren/admin/library/admin_config.php";
	$link = podkluchenieBD($domain, $login, $pass, $database); //Подключаемся к БД

	//Выбор полей базы данных  страницы
	$select_page = selectDB($link, $db_table_admin, $columnsAdmin, "name_page='delete_page_PHP'", false);//Выбор шаблона из БД
	$page_massive = fech_array($select_page, "MYSQLI_ASSOC");//Поля  в массиве
	//Конец выбора полей базы данных  страницы
	
	//Выбор полей базы данных шаблона страницы
$select_template = selectDB($link, $db_table_01, $columnsDB_01, "name_template='$page_massive[name_template]'", false);//Выбор шаблона из БД
$template_massive = fech_array($select_template, "MYSQLI_ASSOC");//Поля шаблона в массиве
//Конец выбора полей базы данных шаблона страницы

$css_href_main = $template_massive[css_href_main]."main_".$page_massive[name_template].".css";//Полное имя CSS файла для всех страниц 
$js_href_main =  $template_massive[js_href_main]."main_".$page_massive[name_template].".js";//Полное имя CSS файла для всех страниц 

?>
<!DOCTYPE html>
 <html>
 <head>
	<title><?php echo("$page_massive[title]")?></title>
	<meta charset="utf-8" />
	<link href="<?php echo("$page_massive[favicon]")?>" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo("/admin/css/main_$page_massive[name_template].css")?>"><!-- Подключаем общие стили для всех страниц -->
	<script type="text/javascript" src="<?php echo("/admin/js/main_$page_massive[name_template].js")?>"></script> <!--Подключаем общие скрипты для всех страниц-->
</head>
	<body>
	<div id="page">

			<!-- Начало хедера -->
			<header>
				<?php include "$koren$page_massive[include_folder]/header.php";?>
			</header>
			<!-- Конец хедера -->
			
			<!-- Начало контейнера для колонок меню и контента -->
			<section>
			
				<!-- Начало левой колонки -->
				<nav id="leftmenu">
					<?php include "$koren$page_massive[include_folder]/leftmenu.php";?>
				</nav>
				<!-- Конец левой колонки -->

			<!-- Начало контейнера для Контента -->
				<div id="content">
					<?php eval($page_massive[php_content]);?>
				</div>
			<!-- Конец контейнера для Контента -->
			</section>
			<!-- Конец контейнера для колонок меню и контента -->
			
			<!-- Начало футера -->
			<footer>
				<?php include "$koren$page_massive[include_folder]/footer.php";?>
			</footer>
			<!-- Конец футера -->

		</div>
	</body>
	</html>