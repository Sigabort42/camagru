"use strict";

let like = document.querySelectorAll(".image_galeries > .like");
let xhr = "";

function getXMLHttpRequest() {
	let xhr = null;
	
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
	xhr = getXMLHttpRequest();
	xhr.open("POST", "Modeles/add_comment.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    str += "verif=" + e.target.dataset.value + "&comment=" + document.querySelector(".comment").value + "&id=" + location.search.split("=")[1];
	xhr.send(str);
	xhr.addEventListener("load", function (){
		let data = "";
		data = JSON.parse(xhr.responseText);
		if (data["mode"] == "0")
			like[0].value = "Like " + data["like_photo"]; 
		else if (data["mode"] == "1")
		{
			let cm = document.querySelector(".image_galeries .comment .ok").cloneNode(true);
			let comment = document.querySelectorAll(".image_galeries .comment");
			cm.innerHTML = "<em><p class='cm'>" + data["comment"] + "</p></em> <strong><p class='date_cm'>" + data["date_comment"] + "</p></strong>";
			comment[1].append(cm);
		}
	})
}

like[0].addEventListener("click", function(e){
    e.preventDefault();
	ft_like_or_comment(e);
});
like[1].addEventListener("click", function(e){
    e.preventDefault();
    ft_like_or_comment(e);
});