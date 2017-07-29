<?php
//Фукнция создает fieldset с инпутами, чекбоксами и другими элементами формы. Параметры формы находятся в массиве 
function fieldsetInputs($fieldsetName, $inputMassive){
	echo "<fieldset style='width:650px; display:block'><legend>".$fieldsetName."</legend>";
   	for ($i=0; $i<count($inputMassive); $i++){ 
		switch ($inputMassive[$i][type]) {
			case "input":
				echo "<p><label for='id_".$inputMassive[$i][name]."' style='width:".$inputMassive[$i][widthl]."; display:inline-block';>".$inputMassive[$i][text]."</label>\n";
				echo "<input type='text' id='id_".$inputMassive[$i][name]."' name='".$inputMassive[$i][name]."' value='".$inputMassive[$i][value]."' style='width:".$inputMassive[$i][width].";'>".$inputMassive[$i][edIz]."</p>";
				break;
			case "checkbox":
				echo "<p> <label><input type='checkbox' name='".$inputMassive[$i][name]."'>".$inputMassive[$i][text]."</label></p>";
				break;
				break;
			case "textarea":
				echo "<p>".$inputMassive[$i][text]."</p>\n
				<textarea name='".$inputMassive[$i][name]."' cols='".$inputMassive[$i][cols]."' rows='".$inputMassive[$i][rows]."'>
".$inputMassive[$i][textCode]."\n
				</textarea>\n";
				break;
			case "radio":
				echo "radio";
				break;
		}
		
	}
		
   echo "</fieldset>";
	}
	//конец функции
	
//Функция вставляет вначале строки табуляции
function insert_tab($tab,$str){
	for ($j=0; $j<=$tab;$j++){
				$str.="\t";//HTML код для меню
			}
	return $str;
}
//Конец функций которая вставляет вначале строки табуляции