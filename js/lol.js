"use strict";

var like = document.querySelector(".image_galeries");

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

function ft_like_or_comment()
{
    let str = "";
    console.log("commenrekk");
    let xhr = getXMLHttpRequest();
    xhr.open("POST", "Modeles/add_comment.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    str += "photo=" + "lololol";
    str +=  "&top=" + "lililil" + "&left=" + "lklklklk";
    xhr.send(str);
}

like.addEventListener("click", function(e){
    e.preventDefault();
    ft_like_or_comment();
});