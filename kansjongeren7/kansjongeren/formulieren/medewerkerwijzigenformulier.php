<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
// Bestanden importeren
require '../php/medewerker.php';

// Class aanroepen en opslaan in variabele
$medewerkers = new Medewerkers();

// Inhoud formuliervelden opslaan in variabelen
$id = $_POST['id_medewerker'];
$naam = $_POST['voornaam'];
$tussenvoegsels = $_POST['tussenvoegsels'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
// Functie uitvoeren en resultaat opslaan in vaiabele
$wijzigen = $medewerkers->medewerkerWijzigen($id, $naam, $tussenvoegsels, $achternaam, $email, $wachtwoord);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($wijzigen == true) {
    header('Location: ../overzichtmedewerkers.php');
} else {
    echo 'mislukt';
}