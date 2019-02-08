<?php

session_start();
echo phpinfo();

// var_dump($_POST["email"]);
var_dump($_SESSION["user"]["email"]);

if (strstr($_SERVER["HTTP_REFERER"], "choice=6"))
{
    $mail = $_SESSION["user"]["email"];
    // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Bonjourno " . htmlspecialchars($_SESSION["user"]['nom']) . " .Voici le lien pour reinitialise votre mot de passe http://localhost:8888/camagru/index.php?choice=7" . $passage_ligne . $passage_ligne .

    "Message partie php" . htmlspecialchars($_SESSION["user"]['email'])  . $passage_ligne .
// "Telephone : " . $_POST['phone'] . $passage_ligne .
    "email " . htmlspecialchars($_SESSION["user"]['mail'])  . $passage_ligne . $passage_ligne .
    
    
    $message_html = "<html><head></head><body>Bonjour " . htmlspecialchars($_SESSION["user"]['nom']) ."<br /><br /> 
    <strong></strong> " . " .Voici le lien pour reinitialise votre mot de passe http://localhost:8888/camagru/index.php?choice=7" .  "<br /> 

    <strong>email : </strong>" . $_SESSION["user"]['email'] . "<br />
    
    </body></html>";
    //==========
    
    //=====Création de la boundary
    $boundary = "-----=".md5(rand());
    //==========
    
    //=====Définition du sujet.
    $sujet = "reinitialisation du mot de passe";
    //=========
    
    //=====Création du header de l'e-mail.
    $header = "From: \"camagru \"<".$_SESSION["user"]["email"].">".$passage_ligne;
    $header.= "Reply-to: \"camagru \" <".$_SESSION["user"]["email"].">".$passage_ligne;
    $header .= "Bcc: <".$_SESSION["user"]["email"].">" .$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    //==========
    
    //=====Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format texte.
    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========   
    //=====Envoi de l'e-mail.
    var_dump($message);
    var_dump(mail($mail,$sujet,$message,$header));
    // echo "<p>Veuillez consulter votre boite mail pour reinitialiser votre mot de passe !</p>";
}
?>