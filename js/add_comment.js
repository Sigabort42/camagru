"use strict";

var like = document.querySelectorAll(".image_galeries > .like");

function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function ft_like_or_comment(e)
{
    let str = "";
    let xhr = getXMLHttpRequest();
    xhr.open("POST", "Modeles/add_comment.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    str += "verif=" + e.target.value + "&comment=" + document.querySelector(".comment").value + "&id=" + location.search.split("=")[1];
    xhr.send(str);
}

like[0].addEventListener("click", function(e){
	console.log(e.target.value);
    e.preventDefault();
    ft_like_or_comment(e);
});
like[1].addEventListener("click", function(e){
	console.log(e.target.value);
    e.preventDefault();
    ft_like_or_comment(e);
});