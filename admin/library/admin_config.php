<?php
$domain="uchitsia.ru"; //Домен
$login = "Andrey";	//Пользователь БД
$pass = "1"; //Пароль 
$database = "mySiteBuilder"; //Используемая БД
$db_table_admin = "adminPage"; //Таблица для страниц администратора
$db_table_01 = "websiteTemplate"; //Таблица для шаблона
$db_table_02 = "websitePage"; //Таблица для страниц
$db_table_03 = "websiteMenu"; //Таблица для меню
$db_table_04 = "news"; //Таблица для меню
$koren = $_SERVER["DOCUMENT_ROOT"]; //дополнение к ссылке

//Поля для $db_table_admin. Нужно для запросов. Поля БД для страниц администратора
$columnsAdmin = "name_page,
			title,
			favicon,
			href_page,
			pageCSS,
			pageJavaScript,
			name_template,
			php_content,
			include_folder
			";
//Конец полей для $db_table_admin

//Поля для $db_table_01. Нужно для запросов. Поля БД для шаблона
$columnsDB_01 ="name_template,
			width_page,
			height_page,
			css_href_main,
			main_css_code,
			js_href_main,
			main_javaScript_code,
			width_header,
			height_header,
			visible_header,
			width_leftColumn,
			height_leftColumn,
			visible_leftColumn,
			width_rightColumn,
			height_rightColumn,
			visible_rightColumn,
			width_footer,
			height_footer,
			visible_footer,
			width_content,
			height_content";
//Конец полей для $db_table_01

//Поля для $db_table_02. Нужно для запросов. Поля БД для страницы
$columnsDB_02 ="name_page, 
				title,
				author,
				description,
				keywords,
				favicon,
				href_page,
				css_href_page,
				pageCSS,
				js_page,
				pageJavaScript,
				type_pages,
				name_template,
				php_content,
				include_folder";
//Конец полей для $db_table_02

//Поля для $db_table_03. Нужно для запросов. Поля БД для МЕНЮ
$columnsDB_03 ="name_menu,
				type_menu,
				items_menu,
				class_menu,
				javaScript_code_menu,
				css_code_menu";
//Конец полей для $db_table_03

//Поля для $db_table_04. Нужно для запросов. Поля БД для МЕНЮ
$columnsDB_04 ="name_news,
				name_news_line,
				comments,
				max_news,
				news_link_include";
//Конец полей для $db_table_04

//Поля для $db_table_05. Нужно для запросов. Поля БД для МЕНЮ
$columnsDB_05 ="name_new,
				сreation_date,
				date_changes,
				very_brief_description,
				brief_description,
				text_news,
				sources,
				author_news,
				tags";
//Конец полей для $db_table_05
