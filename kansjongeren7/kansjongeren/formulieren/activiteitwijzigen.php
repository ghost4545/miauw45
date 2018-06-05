<?php
session_start();
require '../php/activiteit.php';
$activiteiten = new Activiteiten();

$id = $_POST['id_activiteit'];
$naam = $_POST['naam'];
$startdatum = $_POST['startdatum'];
$einddatum = $_POST['einddatum'];

$wijzigen = $activiteiten->activiteitWijzigen($id, $naam, $startdatum, $einddatum);

if ($wijzigen == true) {
    header('Location: ../overzichtactiviteiten.php');
} else {
    echo 'mislukt';
}