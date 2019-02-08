"use strict";

var flag = 0;
var canvas = document.querySelector("#canvas");
var photo = document.querySelector('#photo');
var check = document.querySelectorAll(".image > input");
var dragged = null;
let i = 0;

function start_drag()
{
    dragged = document.querySelector('.png_prise');
}

// if (file_photo)

while (check[i])
{
    check[i].addEventListener("click", function(e){
        if (e.target.checked)
        {
            let input = document.createElement("img");
            input.setAttribute("src", "/camagru/" + e.target.dataset.chemin);
            let name = e.target.dataset.chemin.substr(e.target.dataset.chemin.lastIndexOf("/") + 1, 5);
            input.setAttribute("class", "png_prise " + name);
            input.setAttribute("onmousedown", "start_drag()");
            let article = document.querySelector(".article");
            let res = article.append(input);
        }
        else
        {
            let input = document.querySelector(".article > img");
            let article = document.querySelector(".article");
            let res = article.removeChild(input);
        }
    });
    i++;
}

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

function drag_onmousemove(event)
{
    console.log("mousemove");
    if(dragged)
    {
        let x = event.clientX;
        let y = event.clientY;
        // dragged.style.position = 'relative';
        dragged.style.left = x - 400 + 'px';
        dragged.style.top = y - 654 + 'px';
    }
}

function drag_onmouseup(event)
{
    console.log("mouseup");
    dragged = null;
}

function addEvent(obj,event,fct)
{
    if(obj.attachEvent)
        obj.attachEvent('on' + event,fct);
    else
        obj.addEventListener(event,fct,true);
}

addEvent(document.querySelector(".article"), 'mousemove', drag_onmousemove);
addEvent(document.querySelector(".article"), 'mouseup', drag_onmouseup);

function takepicture() {
    let i = 0;
    let str = "";
    canvas.width = 320;
    canvas.height = 320;
    canvas.getContext('2d').drawImage(document.querySelector('video'), 0, 0, 320, 320);
    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
    let xhr = getXMLHttpRequest();
    xhr.open("POST", "Controller/montage.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    str += "ok=1&photo=" + encodeURIComponent(data);
    while (check[i])
    {
        if (check[i].checked)
            str += "&montage" + i + "=" + encodeURIComponent(check[i].dataset.chemin);
        i++;
    }
    str +=  "&top=" + encodeURIComponent(document.querySelector(".png_prise").style.top) +
            "&left=" + encodeURIComponent(document.querySelector(".png_prise").style.left); 
    xhr.send(str);
}

function    ft_upload()
{
    console.log(file_photo.value);
}

var promise = navigator.mediaDevices.getUserMedia({ audio: false, video: true, facingMode: "user" })
    .then(function(mediaStream) {
        flag = 1;
        let input = document.createElement("video");
        let article = document.querySelector(".article");
        let res = article.append(input);
        let video = document.querySelector('video');
        input = document.createElement("input");
        input.setAttribute("type", "submit");
        input.setAttribute("class", "capturer");
        input.setAttribute("value", "Capturer");
        article = document.querySelector(".article");
        res = article.prepend(input);
        video.srcObject = mediaStream;
        video.onloadedmetadata = function(e) {
            if (flag == 1)
            {
                document.querySelector(".article > .capturer").addEventListener('click', function(ev){
                    ev.preventDefault();
                    takepicture();
                }, false);
            }
            video.play();
        };
    })
    .catch(function(err){
//        console.log(err.name + ": " + err.message);
            var input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("class", "file_photo_input");
            var article = document.querySelector(".article");
            var res = article.append(input);
            var file_photo = document.querySelector('.prise .article > .file_photo_input');
            file_photo.addEventListener("change", function (e){
                console.log("lolldksfjsldkj");
                console.log(file_photo.value);
                input = document.createElement("input");
                input.setAttribute("type", "submit");
                input.setAttribute("class", "capturer");
                input.setAttribute("value", "Capturer");
                article = document.querySelector(".article");
                res = article.append(input);
                input = document.createElement("img");
                input.setAttribute("src", file_photo.value.split("\\").join("/").replace("C:", ""));
                input.setAttribute("class", "capturer");
                article = document.querySelector(".article");
                res = article.append(input);
                
            });
});
