<?php
//Форма для создания шаблона
include "../library/admin_library.php";

//Общие параметры шаблоны
$inputObschie=[];
$inputObschie[]=[type => "input", name => "name_template", widthl => "270px" , width => "80px", value => "", edIz => "", text => "Имя шаблона"];
$inputObschie[]=[type => "input", name => "width_page", widthl => "270px" , width => "80px", value => "1024px", edIz => "px, % писать нужно.", text => "Ширина страницы"];
$inputObschie[]=[type => "input", name => "height_page", widthl => "270px", width => "80px", value => "768px", edIz => "px, % писать нужно.", text => "Высота страницы"];
$inputObschie[]=[type => "input", name => "css_href_main", widthl => "270px", width => "100px", value => "/css/", dIz => "", text => "Путь к CSS файлу для CSS файла для всех страниц.  '/' обязателен"];
$inputObschie[]=[type => "input", name => "js_href_main", widthl => "270px", width => "100px", value => "/js/", dIz => "", text => "Путь к файлу JavaScript для всех страниц. '/' обязателен"];

//$inputObschie[]=[type => "input", name => "css_template", widthl => "270px", width => "100px", value => "/template/", dIz => "", text => "Путь к CSS файлу для шаблона относительно корня сайта. '/' обязателен"];
//$inputObschie[]=[type => "textarea", name => "css_code_template", text => "Стили для шаблона (Код дописывается к коду, который генерирует программа):", cols => 80, rows => 10, textCode => $css_code_template];
//$inputObschie[]=[type => "input", name => "javaScript_template", widthl => "270px", width => "100px", value => "/template/", dIz => "", text => "Путь к файлу JavaScript для шаблона относительно корня сайта. '/' обязателен"];
//$inputObschie[]=[type => "textarea", name => "javaScript_code", text => "JavaScript для шаблона (Код дописывается к коду, который генерирует программа):", cols => 80, rows => 10, textCode => ""];


//параметры для hedera
$inputHeader=[];
$inputHeader[]=[type => "input", name => "width_header", widthl => "270px" , width => "80px", value => "100%", edIz => "px, % писать нужно.", text => "Ширина блока"];
$inputHeader[]=[type => "input", name => "height_header", widthl => "270px" , width => "80px", value => "100px", edIz => "px, % писать нужно.", text => "Высота блока"];
$inputHeader[]=[type => "checkbox", name => "visible_header", widthl => "200px" , width => "80px", value => "", edIz => "", text => "Отключить HEADER"];

//параметры для левой колонки
$inputLeftColumn=[];
$inputLeftColumn[]=[type => "input", name => "width_leftColumn", widthl => "270px" , width => "80px", value => "300px", edIz => "px, % писать нужно.", text => "Ширина блока"];
$inputLeftColumn[]=[type => "input", name => "height_leftColumn", widthl => "270px" , width => "80px", value => "500px", edIz => "px, % писать нужно.", text => "Высота блока"];
$inputLeftColumn[]=[type => "checkbox", name => "visible_leftColumn", widthl => "200px" , width => "80px", value => "", edIz => "", text => "Отключить Левую колонку"];

//параметры для правой колонки
$inputRightColumn=[];
$inputRightColumn[]=[type => "input", name => "width_rightColumn", widthl => "270px" , width => "80px", value => "300px", edIz => "px, % писать нужно.", text => "Ширина блока"];
$inputRightColumn[]=[type => "input", name => "height_rightColumn", widthl => "270px" , width => "80px", value => "500px", edIz => "px, % писать нужно.", text => "Высота блока"];
$inputRightColumn[]=[type => "checkbox", name => "visible_rightColumn", widthl => "200px" , width => "80px", value => "", edIz => "", text => "Отключить Правую колонку"];

//параметры для подвала
$inputFooter=[];
$inputFooter[]=[type => "input", name => "width_footer", widthl => "270px" , width => "80px", value => "100%", edIz => "px, % писать нужно.", text => "Ширина блока"];
$inputFooter[]=[type => "input", name => "height_footer", widthl => "270px" , width => "80px", value => "100px", edIz => "px, % писать нужно.", text => "Высота блока"];
$inputFooter[]=[type => "checkbox", name => "visible_footer", widthl => "200px" , width => "80px", value => "", edIz => "", text => "Отключить Подвал"];

//Создание CSS файла для всего сайта



$textCode_CSS='
//Создаем файл стилей для всех страниц для данного шаблона
$textCode=<<<textCode
@charset "utf-8";

/*Общие стили для всех страниц */
/*-------------------Стили блоов---------------------*/
/* Главная страница */
html, body, #page, section{
	margin:0px;		/* Убираем внешние отступы */
	padding:0px;	/* Убираем внутренние отступы */
	
}	
/*Стили для контейнера страницы*/
	#page {
		width: $width_page;
		min-height: $height_page;
		margin: 0px auto;		/* Выравниваем по центру */
		}
/*Конец стилей контейнера страницы*/
textCode;
if(!$visible_header){//Если header отключен, то не выводить стили для header
$textCode=$textCode.<<<textCode
/* Начало стилей хедера */
	header{
		overflow: hidden;
		width: $width_header;	/* устанавливаем ширину элемента */
		min-height:$height_header;	/* устанавливаем высоту элемента */
		}
/* конец стилей хедера */
textCode;
}
//end IF
if(!$visible_leftColumn){//Если Левая колонка отключена, то не выводить стили 
$textCode=$textCode.<<<textCode
/*стили контейнера для левого меню */
#leftmenu{
	overflow: hidden;
	width: $width_leftColumn;	/* устанавливаем ширину элемента */
	min-height: $height_leftColumn;		/* устанавливаем минимальную высоту элемента */
	float: left;	/* элементы плавают слева */
	}
/* конец стилей контейнера для левого меню */
textCode;
}
//end IF
if(!$visible_rightColumn){//Если Правая колонка отключена, то не выводить стили 
$textCode=$textCode.<<<textCode
/*стили контейнера для правого меню */
#rightmenu{
	overflow: hidden;
	width: $width_rightColumn;	/* устанавливаем ширину элемента */
	min-height: $height_rightColumn;		/* устанавливаем минимальную высоту элемента */
	float: right;	/* элементы плавают слева */
	}
/* конец стилей контейнера для правого меню */
textCode;
}
//end IF
$textCode=$textCode.<<<textCode
/* Начало стилей контента */
#content{
	overflow: hidden;
	float: left;	/* элементы плавают слева */
	width: $width_content;	/* устанавливаем ширину элемента */
	min-height: $height_content;	/* 	устанавливаем минимальную высоту элемента */
	}
/* Конец стилей контента */

/* Начало блока псевдоэлемента для снятия плавания блоков */
section::after{
content:"";	/* Контент отсутсвует */
display: block;	/* элемент показывается как блочный */
clear:both;	/* отменяет плавание объектов с обоих сторон */
}
/* конец блока псевдоэлемента для снятия плавания блоков */
textCode;

if(!$visible_footer){//Если Правая колонка отключена, то не выводить стили 
$textCode=$textCode.<<<textCode
/* Стили футера */
footer{
	overflow: hidden;
	width: $width_footer;	/* устанавливаем ширину элемента */
	height: $height_footer;	/* устанавливаем высоту элемента */
	}
/* Конец стилей футера */
textCode;
}
//end IF
$textCode=$textCode.<<<textCode
/*-----------Конец создания блоков страницы-------------------

/* Начало стилей хедера */
header{
	background-color:#ee454E;	 /* устанавливаем цвет фона */
	}
/* конец стилей хедера */
/*стили контейнера для левого меню */
#leftmenu{
	background-color: #45ee4E;	 /* устанавливаем цвет фона */
	}
/* конец стилей контейнера для левого меню *//*стили контейнера для правого меню */
#rightmenu{
	background-color:  #007E8E;	 /* устанавливаем цвет фона */
	}
/* конец стилей контейнера для правого меню */
/* Начало стилей контента */
#content{
	background-color: #E07E8E;	 /* устанавливаем цвет фона */
	}
/* Конец стилей контента */
/* Стили футера */
footer{
	background-color: #0078EE;	 /* устанавливаем цвет фона */
	}
/* Конец стилей футера */
textCode;
';

$inputObschie[]=[type => "textarea", name => "main_css_code", text => "PHP код, который создает CSS код для всех страниц и сохраняет в переменную", cols => 80, rows => 10, textCode => $textCode_CSS];
$inputObschie[]=[type => "textarea", name => "main_javascript_code", text => "JavaScript для всех страниц:", cols => 80, rows => 10, textCode => ""];

//Конец создания CSS для всего сайта
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Форма для шаблона</title>
</head>

<body>
<h1>Форма для создания шаблона</h1>
<form name="createTemplate" method="POST" action="create_template_db.php">
  	 <?php   
	   
		fieldsetInputs("Общие параметры шаблоны", $inputObschie);
		fieldsetInputs("Параметры для HEDER", $inputHeader);
		fieldsetInputs("Параметры левой колонки", $inputLeftColumn);
		fieldsetInputs("Параметры правой колонки", $inputRightColumn);
		fieldsetInputs("Параметры футера", $inputFooter);
		?>
 <input type="submit" value="Создать шаблон">
</form>
</body>
</html>