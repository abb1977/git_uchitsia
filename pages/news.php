<?php
	header("Content-Type: text/html; charset=utf-8");
	$koren = $_SERVER["DOCUMENT_ROOT"]; //дополнение к ссылке
	include "$koren/admin/library/admin_library_db.php";
	include "$koren/admin/library/admin_config.php";
	$link = podkluchenieBD($domain, $login, $pass, $database); //Подключаемся к БД

	//Выбор полей базы данных  страницы
	$select_page = selectDB($link, $db_table_02, $columnsDB_02, "name_page='news'", false);//Выбор шаблона из БД
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
	<meta name="author" content = "<?php echo("$page_massive[author]")?>" />
	<meta name="description" content= "<?php echo("$page_massive[description]")?>"/>
	<meta name="keywords" content= "<?php echo("$page_massive[keywords]")?>"/>
	<link href="<?php echo("$page_massive[favicon]")?>" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo("$page_massive[css_href_page]")?>news.css"> <!--Подключаем стили данной страницы-->
	<link rel="stylesheet" href="<?php echo("$css_href_main")?>"><!-- Подключаем общие стили для всех страниц -->
	<!--<link rel="stylesheet" href="/css/include.css">/> Подключаем стили Которые инклюдятся. Все стили кусков кодов, которые инклюдятся находятся в этом файле-->
	<script type="text/javascript" src="<?php echo("$page_massive[js_page]")?>news.js"></script> <!--Подключаем скрипты для данной страницы-->
	<script type="text/javascript" src="<?php echo("$js_href_main")?>"></script> <!--Подключаем общие скрипты для всех страниц-->
	<!--<script type="text/javascript" src="/js/include.js"></script> Подключаем скрипты файлов, которые инклюдятся-->
</head>
	<body>
	<div id="page">
		<?php if(!$template_massive[visible_header]){
$code=<<<codeBlocks
			?><!-- Начало хедера -->
			<header>
				<?php include "$koren$page_massive[include_folder]/header.php";?>
			</header>
			<!-- Конец хедера -->
codeBlocks;
			eval($code);
			}
			if(!$template_massive[visible_leftColumn]){
$code=<<<codeBlocks
			?><!-- Начало контейнера для колонок меню и контента -->
			<section>
			
				<!-- Начало левой колонки -->
				<nav id="leftmenu">
					<?php include "$koren$page_massive[include_folder]/leftmenu.php";?>
				</nav>
				<!-- Конец левой колонки -->
codeBlocks;
			eval($code);
			}
			?>
			<!-- Начало контейнера для Контента -->
				<div id="content">
					<?php //eval($page_massive[php_content]);?>
				</div>
			<!-- Конец контейнера для Контента -->
			<?php if(!$template_massive[visible_rightColumn]){
$code=<<<codeBlocks
			?><!-- Начало правой колонки -->
				<nav id="rightmenu">
					<?php include "$koren$page_massive[include_folder]/rightmenu.php";?>
				</nav>
				<!-- Конец правой колонки -->
codeBlocks;
			eval($code);
			}	
			?>				
			</section>
			<!-- Конец контейнера для колонок меню и контента -->
			<?php if(!$template_massive[visible_footer]){
$code=<<<codeBlocks
			?><!-- Начало футера -->
			<footer>
				<?php include "$koren$page_massive[include_folder]/footer.php";?>
			</footer>
			<!-- Конец футера -->
codeBlocks;
			eval($code);
			}	
			?>
	</div>
	</body>
	</html>
