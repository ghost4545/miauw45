<?php
session_start();
require '../php/jongeren.php';
$jongeren = new Jongeren();

$id = $_POST['id_jongere'];
$voornaam = $_POST['voornaam'];
$tussenvoegsels = $_POST['tussenvoegsels'];
$achternaam = $_POST['achternaam'];
$geboortedatum = $_POST['geboortedatum'];
$inschrijfdatum = $_POST['inschrijfdatum'];

$wijzigen = $jongeren->jongereWijzigen($id, $voornaam, $tussenvoegsels, $achternaam, $geboortedatum, $inschrijfdatum);

if ($wijzigen == true) {
    header('Location: ../overzichtjongeren.php');
} else {
    echo 'mislukt';
}

?>