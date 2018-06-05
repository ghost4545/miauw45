<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
// Bestanden importeren
require '../php/instituut.php';

// Class aanroepen en opslaan in variabele
$instituten = new Instituten();

// Inhoud formuliervelden opslaan in variabelen
$id = $_POST['id_instituut'];
$naam = $_POST['naam'];
$telefoon = $_POST['telefoon'];


// Functie uitvoeren en resultaat opslaan in vaiabele
$wijzigen = $instituten->instituutWijzigen($id, $naam, $telefoon);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($wijzigen == true) {
    header('Location: ../overzichtinstituten.php');
} else {
    echo 'mislukt';
}