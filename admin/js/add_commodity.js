window.onload = function () {
	var picElt = document.getElementById("pic");
	var pictElt = document.getElementById("pict");
	var cElt = document.getElementById("c");
	picElt.onclick = function () {
		cElt.click();
	}
	cElt.onchange = function () {
		pictElt.value = cElt.value;
	}
}