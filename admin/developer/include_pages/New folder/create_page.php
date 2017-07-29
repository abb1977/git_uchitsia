<?php
include "../library/admin_library.php";

//Параметры страницы	
$inputPage=[];
$inputPage[]=[type => "input", name => "name_page", widthl => "270px" , width => "80px", value => "", edIz => "", text => "Имя PHP страницы на сервере"];
$inputPage[]=[type => "input", name => "title", widthl => "270px" , width => "80px", value => "", edIz => "", text => "Заголовок страницы"];
$inputPage[]=[type => "input", name => "author", widthl => "310px", width => "200px", value => "Барышников Андрей Борисович", dIz => "",text => "Автор сайта"];
$inputPage[]=[type => "input", name => "description", widthl => "310px", width => "200px", value => "конструктор сайта Барышникова Андрея Борисовича", dIz => "",text => "Информация о сайте"];
$inputPage[]=[type => "input", name => "keywords", widthl => "310px", width => "200px", value => "Ключевые, слова", dIz => "",text => "Ключевые слова через запятую"];
$inputPage[]=[type => "input", name => "favicon", widthl => "310px", width => "200px", value => "/images/favicon.ico", dIz => "",text => "Полное имя файла иконки для сайта относительно корня сайта. '/' обязателе"];
$inputPage[]=[type => "input", name => "href_page", widthl => "270px", width => "100px", value => "/pages/", dIz => "",text => "Путь местонахождения страницы относительно корня сайта. '/' обязателен"];
$inputPage[]=[type => "input", name => "css_href_page", widthl => "270px", width => "100px", value => "/css/", dIz => "",text => "Путь к CSS файлу для страницы относительно корня сайта. '/' обязателен"];
$inputPage[]=[type => "textarea", name => "pageCSS", text => "Стили для страницы:", cols => 70, rows => 10, textCode => "/*Стили для страницы*/"];
$inputPage[]=[type => "input", name => "js_page", widthl => "310px", width => "200px", value => "/js/", dIz => "",text => "Путь к JavaScript файлу страницы относительно корня сайта. '/' обязателе"];
$inputPage[]=[type => "textarea", name => "pageJavaScript", text => "JavaScript для страницы:", cols => 70, rows => 10, textCode => "//Скрипты для страницы"];
$inputPage[]=[type => "input", name => "type_pages", widthl => "270px" , width => "80px", value => "simple", edIz => "", text => "Тип страницы"];
$inputPage[]=[type => "input", name => "name_template", widthl => "270px" , width => "80px", value => "simple", edIz => ".", text => "Имя шаблона"];
$inputPage[]=[type => "textarea", name => "php_content", text => "PHP код для контента:", cols => 70, rows => 10, textCode => "?><h1>Страница пустая</h1>"];
$inputPage[]=[type => "input", name => "include_folder", widthl => "270px" , width => "80px", value => "/include/", edIz => ".", text => "Папка где хранятся системные файлы, которые инклюдятся относительно корня сайта. '/' обязателен"];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Форма для создания страницы</title>
</head>

<body>
<h1>Форма для создания страницы</h1>
<form name="createPage" method="POST" action="create_page_PHP.php">
  	 <?php   
	   
		fieldsetInputs("Параметры для страницы", $inputPage);
		
		?>
 <input type="submit" value="Создать страницу">
</form>
</body>
</html>