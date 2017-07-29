
function page_javascript(){
	//Скрипты для страницы
//Скрипты для страницы
	//document.getElementById('ajax_proba').innerHTML="hkjfdhjkcndsvnckjsd";
	// var name = document.getElementById('name');
	// var email = document.querySelector('#email');
	// var phone = document.querySelector('#phone');
	
	// document.getElementById('send').onclick = function(){	
		// console.log("Нажали на кнопку");
		// str = "name="+name.value+"&email="+email.value+"&phone="+phone.value;
		// console.log(str);
		//ajax("POST", "ajax_proba.php", "ajax_proba", str);
	
	// };
	str = "name=odin";			
	ajax("POST", "ajax_menu.php", "content", str);
				

				
	};