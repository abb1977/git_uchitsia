<?php
//Выбор полей базы данных редактирования новостной ленты

header("Cache-Control","no-store");
header("Content-Type: text/html; charset=utf-8");
$koren = $_SERVER["DOCUMENT_ROOT"]; //дополнение к ссылке
	include "$koren/admin/library/admin_config.php";
	include "$koren/admin/library/admin_library_db.php";
$name_news="odin";	
	
	$link = podkluchenieBD($domain, $login, $pass, $database); //Подключаемся к БД
// $select_news_del = selectDB($link, "news_$_POST[name]", "id, name_new", false, false);//Выбор новости из БД
// $news_massive_del = fech_array($select_news_del, "MYSQLI_ASSOC");//Поля новости в массиве
//Конец выбора полей базы данных новостной ленты

//Выбор полей базы данных новостной ленты
		$select_news_line = selectDB($link, "news", "name_news_line, max_news", "name_news='$name_news'", false);//Выбор новости из БД
		$news_line_massive = fech_array($select_news_line, "MYSQLI_ASSOC");//Поля новости в массиве
		//Конец выбора полей базы данных новостной ленты
		$name_news_line = $news_line_massive[name_news_line];
		$max_news = $news_line_massive[max_news];
	//Конц выбора полей базы данных новостной ленты
	$koren = $_SERVER["DOCUMENT_ROOT"]; //дополнение к ссылке
	
	$count_news = countDB($link, "news_$name_news", false);//Число новостей в ленте
	$count_news = $news_line_massive = fech_array($count_news, "MYSQLI_NUM");//Поля новости в массиве
	$count_news = $count_news[0];	
	
	// if(isset($_GET[number_list])){//Номер страницы в выводе новостной ленты 
		// $number_list = $_GET[number_list];
		
	// }else
	// {$number_list = 0;}
	$number_list = 0;
	// if(isset($_GET[visible_new])){//Показывать новость или нет. 1 - показывать, 0 - не показывать
		// $visible_new = $_GET[visible_new];
		// $name_new = $_GET[name_new]; 
	// }else
	// {$visible_new = 0;} 
	
	$visible_new = 0;
	
	$columnsDB_05 ="name_new,
				сreation_date,
				date_changes,
				very_brief_description,
				brief_description,
				text_news,
				sources,
				author_news,
				tags";
	
	//Выбор полей базы данных всех новостей из новостной ленты
		$select_news_line = select_full_DB($link, "news_$name_news", $columnsDB_05, false, false, "$number_list, 5", false);//Выбор новости из БД
		$news_line_massive = fech_array($select_news_line, "MYSQLI_ASSOC");//Поля новости в массиве
		//Конец выбора полей базы данных новостной ленты
		
		
		echo "<h1>Страница №$number_list</h1>";
		echo "______________________________<br>";
		echo "$name_news_line<br>";
		echo "$max_news<br>";
		echo "$name_news<br>";//odin
		echo "$count_news<br>";//22
		echo "----------<br>";
		echo "Страница №$number_list<br>";
		echo "----------<br>";
		echo "$name_new<br>";
		echo "$сreation_date<br>";
		echo "$date_changes<br>";
		echo "$very_brief_description<br>";
		echo "$brief_description<br>";
		echo "$text_news<br>";
		echo "$sources<br>";
		echo "$author_news<br>";
		echo "$tags<br>";
		echo "______________________________<br>";
		
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=0\">0</a><br>";
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=1\">1</a><br>";
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=2\">2</a><br>";
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=3\">3</a><br>";
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=4\">4</a><br>";
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=5\">5</a><br>";
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=6\">6</a><br>";
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=7\">7</a><br>";
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=8\">8</a><br>";
		echo "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?number_list=9\">9</a><br>";
			
		
		
		
		
		
	while ($news_line_massive){	
		$name_new = $news_line_massive[name_new];
		$сreation_date = $news_line_massive[сreation_date];
		$date_changes = $news_line_massive[date_changes];
		$very_brief_description = $news_line_massive[very_brief_description];
		$brief_description = $news_line_massive[brief_description];
		$text_news = $news_line_massive[text_news];
		$sources = $news_line_massive[sources];
		$author_news = $news_line_massive[author_news];
		$tags = $news_line_massive[tags];
	
	//Конц выбора полей базы данных всех новостей из новостной ленты
	
	echo"<div class=\"news_container_$name_news\">";//Контейнер ленты
		echo"<div class=\"news_$name_news\">";//Контейнер для новости
			echo"<div class=\"news_$name_news\">";//Название новости
				echo"<a href=\"$koren"."/news_$name_news.php?name_new=$name_new\">$name_new</a>";
			echo"</div>";
			echo"<div class=\"news_$name_news\">";//Краткое описание
				echo"$brief_description";
			echo"</div>";
			echo"<div class=\"news_date_create_$сreation_date\">";//
				$data=getdate($сreation_date);
				
				echo"Дата создания:$data[mday].$data[mon].$data[year]";
			echo"</div>";
			
			
			echo"<div class=\"news_dalee_$name_news\">";//Далее
				echo"<a href=\"$koren"."/news_$name_news.php?name_new=$name_new&visible_new=1\">Далее...</a>";
			echo"</div>";
			
		echo"</div>";
	echo"</div>";
	
	// <div class="time_$name_news_line">
	// <div>18:39</div>
	// </div>
	// <div class="othnews-container">
	// <table cellspacing="0" cellpadding=" 0">
	// <tbody><tr><td></td></tr>
	// </tbody>
	// </table>
	// <h4><a href="/news/2017/7/22/879752.html">Умер актер из фильма «Один дома»</a></h4>
	// <div class="lead"></div>
	// <div class="text">Американский актер Джон Херд-младший, известный по роли отца главного героя из фильма «Один дома», умер на 73-м году жизни, сообщает издание TMZ.
	// </div>
	// <a href="/news/2017/7/22/879752.html" 
	$news_line_massive = fech_array($select_news_line, "MYSQLI_ASSOC");//Поля новости в массиве
		
	}
	
	

