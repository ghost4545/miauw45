<?php
session_start();
require '../php/activiteit.php';
$activiteiten = new Activiteiten();

$naam = $_POST['naam'];
$startdatum = $_POST['startdatum'];
$einddatum = $_POST['einddatum'];

$aanmaken = $activiteiten->activiteitAanmaken($naam, $startdatum, $einddatum);

if ($aanmaken == true) {
    header('Location: ../overzichtactiviteiten.php');
} else {
    echo 'mislukt';
}