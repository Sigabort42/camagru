#!/usr/bin/env php
<?php
include("database.php");

try
{
    $pdo = new PDO("$DB_DSN;port=8889", $DB_USER, $DB_PASSWORD);
    $db_create = "CREATE DATABASE IF NOT EXISTS $DB_NAME DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $pdo->prepare($db_create)->execute();
}
catch(Exception $e)
{
    echo $e;
}
try
{
    //DATETIME NOT NULL
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $tables = " CREATE TABLE user (
                id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
                nom VARCHAR(40) NOT NULL,
                prenom VARCHAR(255) NOT NULL,
                sexe VARCHAR(40) NOT NULL,
                date_naissance VARCHAR(40),
                email VARCHAR(255) NOT NULL,
                pass VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
                )
                ENGINE=INNODB";
    $db->prepare($tables)->execute();
    $tables = " CREATE TABLE galerie (
                id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
                nom VARCHAR(40) NOT NULL,
                chemin VARCHAR(255) NOT NULL,
                date_prise DATETIME NOT NULL,
                id_user INT UNSIGNED NOT NULL,
                id_popularites INT UNSIGNED NOT NULL,
                PRIMARY KEY (id)
                )
                ENGINE=INNODB";
    $db->prepare($tables)->execute();
    $tables = " CREATE TABLE popularites (
                id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
                like_photo INT UNSIGNED,
                commentaires TEXT,
                date_commentaires DATETIME NOT NULL,
                id_user INT UNSIGNED,
                id_galerie INT UNSIGNED NOT NULL,
                PRIMARY KEY (id)
                )
                ENGINE=INNODB";
    $db->prepare($tables)->execute();
}
catch(Exception $e)
{
    echo $e;
}
?>