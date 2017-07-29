
window.onload=function(){
	page_javascript();
	
		
	}
				


function ajax(metod, url, id, params){
	var request= new XMLHttpRequest();
	var str;
	request.onreadystatechange = function (){
		if (request.readyState==4 && request.status == 200){
			str =request.responseText;
			//alert ("Данные с сервера: "+str);
			document.getElementById(id).innerHTML="Данные с сервера: "+str;
		}
		
	}
	if (metod == "POST"){
		request.open("POST", url);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');//Кодируем данные которые передаем
		request.send(params);//Параметры передаются через & как в GET
		
	}
	if (metod == "GET"){
		request.open("GET", url);
		if (params){request.send(params)} else {request.send()};
		
	}
	
}

function main_javascript(){
	
	
	
	
}