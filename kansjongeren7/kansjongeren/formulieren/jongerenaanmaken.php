<?php
session_start();
require '../php/jongeren.php';
$jongeren = new Jongeren();

$voornaam = $_POST['voornaam'];
$tussenvoegsels = $_POST['tussenvoegsels'];
$achternaam = $_POST['achternaam'];
$geboortedatum = $_POST['geboortedatum'];
$inschrijfdatum = $_POST['inschrijfdatum'];

$aanmaken = $jongeren->jongereAanmaken($voornaam, $tussenvoegsels, $achternaam, $geboortedatum, $inschrijfdatum);

if ($aanmaken == true) {
    header('Location: ../overzichtjongeren.php');
} else {
    echo 'mislukt';
}

?>