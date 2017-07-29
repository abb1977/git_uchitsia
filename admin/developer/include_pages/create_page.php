<?php
$koren = $_SERVER["DOCUMENT_ROOT"]; //дополнение к ссылке
include "$koren/admin/library/admin_library.php";
//Параметры страницы	
$inputPage=[];
$inputPage[]=[type => "input", name => "name_page", widthl => "340px" , width => "240px", value => "", edIz => "", text => "Имя PHP страницы на сервере"];
$inputPage[]=[type => "input", name => "title", widthl => "340px", width => "240px", value => "", dIz => "",text => "Заголовок сайта"];
$inputPage[]=[type => "input", name => "favicon", widthl => "340px", width => "240px", value => "/admin/images/favicon.ico", dIz => "",text => "Полное имя файла иконки для сайта относительно корня сайта. '/' обязателе"];
$inputPage[]=[type => "input", name => "href_page", widthl => "340px", width => "240px", value => "/admin/pages/", dIz => "",text => "Путь местонахождения страницы относительно корня сайта. '/' обязателен"];
$inputPage[]=[type => "textarea", name => "pageCSS", text => "Стили для страницы:", cols => 80, rows => 10, textCode => "/*Стили для страницы*/"];
$inputPage[]=[type => "textarea", name => "pageJavaScript", text => "JavaScript для страницы:", cols => 80, rows => 10, textCode => "//Скрипты для страницы"];
$inputPage[]=[type => "input", name => "name_template", widthl => "340px" , width => "240px", value => "admin", edIz => ".", text => "Имя шаблона"];
$inputPage[]=[type => "textarea", name => "php_content", text => "PHP код для контента:", cols => 80, rows => 10, textCode => "?><h1>Страница пустая</h1>"];
$inputPage[]=[type => "input", name => "include_folder", widthl => "340px" , width => "240px", value => "/admin/include_admin/", edIz => ".", text => "Папка где хранятся системные файлы, которые инклюдятся относительно корня сайта. '/' обязателен"];

?>

<div>
<h1>Форма для создания страницы</h1>
<form name="createPage" method="POST" action="create_page_admin_PHP.php">
  	 <?php   
	   
		fieldsetInputs("Параметры для страницы", $inputPage);
		
		?>
 <input type="submit" value="Создать страницу">
</form>
</div>
