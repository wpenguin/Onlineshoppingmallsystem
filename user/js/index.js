window.onload = function  () {
	var liaElt = document.getElementsByClassName("lia");
	var libElt = document.getElementsByClassName("lib");
	var l1Elt = document.getElementsByClassName("l1");
	var menu_box2Elt = document.getElementsByClassName("menu_box2");
	var body_pictureElt = document.getElementsByClassName("body_picture");
	var body_picture_boxElt = document.getElementsByClassName("body_picture_box")[0];
	var a = 1;
	var timer;
	var list = document.querySelector("ol").getElementsByTagName("li");
	
	function change (num) {
		for (var i = 0; i < body_pictureElt.length; i++) {
			body_pictureElt[i].style.display = 'none';
		}
		for(let j = 0; j < 5; j++){
			list[j].setAttribute("class","");
		}
		list[num].className = "on";
		a = num;
		body_pictureElt[num].style.display = 'block';
	}
	function autoplay () {
		if(a == 5){
			a = 0;
		}
		change(a);
		a++;
	}
	timer = setInterval(autoplay, 1000*2);
	
	body_picture_boxElt.onmouseover = function(){ 
	　clearInterval(timer);
	}
	body_picture_boxElt.onmouseout = function(){
	　timer = setInterval(autoplay, 1000*2);
	}
	
	for(let j = 0 ; j < 5; j++){
		list[j].onmouseover = function(){
			change(j);
		}
	}
	
//	for (var i = 0; i < l1Elt.length; i++) {
//		l1Elt[i].onmouseout = function () {
//			menu_box2Elt[i].style.display = 'none';
//		}
//	}

	for (var i = 2; i < liaElt.length; i++) {
		liaElt[i].onclick = function () {
			alert("施工中...");
			return false;
		}
	}
	
	for (var i = 0; i < libElt.length; i++) {
		libElt[i].onclick = function () {
			alert("施工中...");
			return false;
		}
	}
}