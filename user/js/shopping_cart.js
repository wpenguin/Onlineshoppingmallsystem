window.onload = function () {
	var numElt = document.getElementsByClassName("num");
	var numaddElt = document.getElementsByClassName("num_add");
	var numsubElt = document.getElementsByClassName("num_sub");
	var countboxElt = document.getElementsByClassName("countbox");
	var priceboxElt = document.getElementsByClassName("pricebox");
	var toocartElt = document.getElementsByClassName("too_cart")[0];
	var uidboxElt = document.getElementsByClassName("uid_box")[0];
	var idboxElt = document.getElementsByClassName("id_box");
	var ahboxElt = document.getElementById("ah_box");
	var rnameElt = document.getElementById("rname");
	var phoneElt = document.getElementById("phone");
	var addressElt = document.getElementById("address");
	var goElt = document.getElementById("go");
	var cmoneyElt = document.getElementById("cmoney");
	
	var before = goElt.href;
	
	function href () {
		var href = before + "&name=" + rnameElt.value + "&phone=" + phoneElt.value + "&address=" + addressElt.value;
		goElt.href = href;
	}
	
	phoneElt.onblur = function () {
		href ();
	}
	
	rnameElt.onblur = function () {
		href ();
	}
	
	addressElt.onblur = function () {
		href ();
	}
	
	if(ahboxElt.value != ''){
		var a = ahboxElt.value.split('%');
	}
	
	for (var i = 0; i < numElt.length; i++) {
		check (i);
	}
	
	function check (num) {
		if (numElt[num].value == 1) {
			numsubElt[num].href = 'javascript:void(0);';
			numsubElt[num].style.color = "#e9e9e9";
			numsubElt[num].style.cursor = 'default';
		} else if (numElt[num].value == 10){
			numaddElt[num].href = 'javascript:void(0);';
			numaddElt[num].style.color = "#e9e9e9";
			numaddElt[num].style.cursor = 'default';
		}else{
			numsubElt[num].style.cursor = 'pointer';
			numaddElt[num].style.cursor = 'pointer';
			numsubElt[num].href = '';
			numsubElt[num].style.color = "#666";
			numaddElt[num].href = '';
			numaddElt[num].style.color = "#666";
		}
	}
	
	function count () {
		var c = 0;
		for (var i = 0; i < numElt.length; i++) {
			c += numElt[i].value*priceboxElt[i].innerHTML;
			cmoneyElt.innerHTML = "￥" + c;
		}
	}
	
	function add (num) {
		numaddElt[num].onclick = function () {
			if(numElt[num].value < 10){
				numElt[num].value++;
				countboxElt[num].innerHTML = "<b>￥"+numElt[num].value*priceboxElt[num].innerHTML+"</b>";
				a[num] = "&id[]=" + idboxElt[num].value + "&num[]=" + numElt[num].value + "&cprice[]=" + numElt[num].value*priceboxElt[num].innerHTML;
				var href = "order_add.php?uid=" + uidboxElt.value;
				for (var i = 0; i < a.length; i++) {
					href += a[i];
				}
				toocartElt.href = href;
				count();
			}
			check(num);
			return false;
		}
	}
	function sub (num) {
		numsubElt[num].onclick = function () {
			if(numElt[num].value > 1){
				numElt[num].value--;
				countboxElt[num].innerHTML = "<b>￥"+numElt[num].value*priceboxElt[num].innerHTML+"</b>";
				a[num] = "&id[]=" + idboxElt[num].value + "&num[]=" + numElt[num].value + "&cprice[]=" + numElt[num].value*priceboxElt[num].innerHTML;
				var href = "order_add.php?uid=" + uidboxElt.value;
				for (var i = 0; i < a.length; i++) {
					href += a[i];
				}
				toocartElt.href = href;
				count();
			}
			check(num);
			return false;
		}
	}
	
	for (var i = 0; i < numElt.length; i++) {
		add(i);
		sub(i);
	}
}