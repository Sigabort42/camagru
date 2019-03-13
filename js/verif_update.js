"use strict"

var form = document.querySelector(".form");

form.pass.addEventListener("input", function(e)
{
    var pass = e.target.value;
    if ((pass.length <= 8) || (pass.length >= 42) || (pass == " ") || !pass.match("^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$"))
        form.pass.style.borderColor = '#ff0000';
    else
    {
        form.pass.style.borderColor = '#00ffff';
        form.pass.style.backgroundColor = '';
    }
});