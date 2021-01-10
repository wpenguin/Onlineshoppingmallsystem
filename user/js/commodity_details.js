window.onload = function () {
	var numElt = document.getElementsByClassName("num")[0];
	var numaddElt = document.getElementsByClassName("num_add")[0];
	var numsubElt = document.getElementsByClassName("num_sub")[0];
	var addcartElt = document.getElementsByClassName("add_cart")[0];
	var idElt = document.getElementsByClassName("id");
	
	function check () {
		if (numElt.value == 1) {
			numsubElt.href = 'javascript::void(0);';
			numsubElt.style.opacity = "0.5";
		} else if (numElt.value == 10){
			numaddElt.href = 'javascript:void(0);';
			numaddElt.style.opacity = "0.5";
		}else{
			numsubElt.href = '';
			numsubElt.style.opacity = "1";
			numaddElt.href = '';
			numaddElt.style.opacity = "1";
		}
	}
	numaddElt.onclick = function () {
		if(numElt.value < 10){
			numElt.value++;
			if(idElt.length != 0){
				var href = "cart_add.php?userid=" + idElt[0].value + "&id=" + idElt[1].value + "&num=" + numElt.value;
				addcartElt.href = href;
			}
		}
		check();
		return false;
	}
	numsubElt.onclick = function () {
		if(numElt.value > 1){
			numElt.value--;
			if(idElt.length != 0){
				var href = "cart_add.php?userid=" + idElt[0].value + "&id=" + idElt[1].value + "&num=" + numElt.value;
				addcartElt.href = href;
			}
		}
		check();
		return false;
	}
}