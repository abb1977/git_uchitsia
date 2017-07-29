<?php
header("Content-Type: text/html; charset=utf-8");
include "../library/admin_library.php";

//Параметры страницы	
$inputMenu=[];
$inputMenu[]=[type => "input", name => "name_menu", widthl => "270px" , width => "80px", value => "", edIz => "", text => "Имя меню:"];
$inputMenu[]=[type => "input", name => "type_menu", widthl => "270px" , width => "80px", value => "", edIz => "", text => "Тип меню (left, right, top):"];
$inputMenu[]=[type => "textarea", name => "items_menu", text => "Пункты меню и ссылки отделенные символом '|'. Знаки '#' перед элементом меню указывают уровень меню", cols => 70, rows => 10, textCode => ""];
$inputMenu[]=[type => "input", name => "class_menu", widthl => "310px", width => "200px", value => "", dIz => "",text => "Имя класса списка меню:"];
$inputMenu[]=[type => "textarea", name => "javaScript_code_menu", text => "JavaScript для меню:", cols => 70, rows => 10, textCode => ""];
$inputMenu[]=[type => "textarea", name => "css_code_menu", text => "CSS код для меню:", cols => 70, rows => 10, textCode => ""];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Форма для создания меню</title>
</head>

<body>
<h1>Форма для создания меню</h1>
<form name="createMenu" method="POST" action="create_menu_include.php">
  	 <?php   
	   
		fieldsetInputs("Параметры для меню", $inputMenu);
		
		?>
 <input type="submit" value="Создать меню">
</form>
</body>
</html>