"use strict";
var formulaire = document.querySelector(".formulaire");
var verifEmail = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

formulaire.nom.addEventListener("input", function(e)
{
    var nom = e.target.value;
    if ((nom.length <= 1) || (nom.length >= 42) || (nom == " "))
        formulaire.nom.style.borderColor = '#ff0000';
    else
    {
        formulaire.nom.style.borderColor = '#00ffff';
        formulaire.nom.style.backgroundColor = '';
    }
});

formulaire.prenom.addEventListener("input", function(e)
{
    var prenom = e.target.value;
    if ((prenom.length <= 1) || (prenom.length >= 42) || (prenom == " "))
        formulaire.prenom.style.borderColor = '#ff0000';
    else
    {
        formulaire.prenom.style.borderColor = '#00ffff';
        formulaire.prenom.style.backgroundColor = '';
    }
});

formulaire.pass.addEventListener("input", function(e)
{
    var pass = e.target.value;
    if ((pass.length <= 8) || (pass.length >= 42) || (pass == " ") || !pass.match("^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$"))
        formulaire.pass.style.borderColor = '#ff0000';
    else
    {
        formulaire.pass.style.borderColor = '#00ffff';
        formulaire.pass.style.backgroundColor = '';
    }
});

formulaire.email.addEventListener("input", function(e)
{
    var mail = e.target.value;
    if (!verifEmail.test(mail))
        formulaire.email.style.borderColor = '#ff0000';
    else
    {
        formulaire.email.style.borderColor = '#00ffff';
        formulaire.email.style.backgroundColor = '';
    }

});

formulaire.date.addEventListener("input", function(e)
{
    if (verifDate(e.target.value))
        formulaire.date.style.borderColor = '#ff0000';
    else
    {
        formulaire.date.style.borderColor = '#00ffff';
        formulaire.date.style.backgroundColor = '';
    }
});

function verifDate(value_date){
    var date_pas_sure = value_date;
    var format = /^(\d{1,2}\/){2}\d{4}$/;
    if(!format.test(date_pas_sure))
        return (true);
    else
    {
        var date_temp = date_pas_sure.split('/');
        date_temp[1] -=1;        // On rectifie le mois !!!
        var ma_date = new Date();
        ma_date.setFullYear(date_temp[2]);
        ma_date.setMonth(date_temp[1]);
        ma_date.setDate(date_temp[0]);
        if(ma_date.getFullYear()==date_temp[2] && ma_date.getMonth()==date_temp[1] && ma_date.getDate()==date_temp[0])
            return (false);
        else
            return (true);
    }
}

function verifForm()
{
    if (!verifEmail.test(formulaire.email.value) || (formulaire.pass.value.length == undefined) ||
    (formulaire.pass.value.length <= 8) || (formulaire.pass.value.length >= 42) ||
    !formulaire.pass.value.match("^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$"))
	{
	    if (!verifEmail.test(formulaire.email.value))
		    formulaire.email.style.backgroundColor = '#ff0000';
	    else if (verifEmail.test(formulaire.email.value))
		    formulaire.email.style.backgroundColor = '';
        if ((formulaire.pass.value.length == undefined) || (formulaire.pass.value.length <= 8) ||
        (formulaire.pass.value.length >= 42) || !formulaire.pass.value.match("^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$"))
		    formulaire.pass.style.backgroundColor = '#ff0000';
	    else if ((formulaire.pass.value.length != undefined) || (formulaire.pass.value.length > 3) || (formulaire.pass.value.length < 42))
		    formulaire.pass.style.backgroundColor = '';
	    return false;
	}
    else// if ((verifEmail.test(formulaire.email.value)))(formulaire.nom.value.length != undefined) || (formulaire.nom.value.length > 3) || (formulaire.nom.value.length < 25)
	{
	    formulaire.pass.style.backgroundColor = '';
	    return true;
	}
}
