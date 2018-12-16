"use strict";

var flag = 0;
var canvas = document.querySelector("#canvas");
var photo = document.querySelector('#photo');
var check = document.querySelectorAll(".image > input");
console.log(check);
let i = 0;
while (check[i])
{
    console.log("lolol");
    check[i].addEventListener("click", function(e){
        if (e.target.checked)
        {
            console.log(e.target.dataset.chemin);
            let input = document.createElement("img");
            input.setAttribute("src", "/camagru/" + e.target.dataset.chemin);
            input.setAttribute("class", "png_prise");
            let article = document.querySelector(".article");
            let res = article.append(input);
        }
        else
        {
            console.log(e.target.dataset.chemin);
            let input = document.querySelector(".article > img");
            let article = document.querySelector(".article");
            let res = article.removeChild(input);
        }
    });
    i++;
}

function takepicture() {
    canvas.width = 320;
    canvas.height = 320;
    canvas.getContext('2d').drawImage(document.querySelector('video'), 0, 0, 320, 320);
    // var data = canvas.toDataURL('image/png');
    // photo.setAttribute('src', data);
  }

var promise = navigator.mediaDevices.getUserMedia({ audio: true, video: true, facingMode: "user" })
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
                    console.log("lololol");
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
            var article = document.querySelector(".article");
            var res = article.append(input);
});
