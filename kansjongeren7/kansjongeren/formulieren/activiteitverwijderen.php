<?php
session_start();
require '../php/activiteit.php';
$activiteiten = new Activiteiten();

$id = $_POST['id_activiteit'];

$verwijderen = $activiteiten->activiteitVerwijderen($id);

if ($verwijderen == true) {
    header('Location: ../overzichtactiviteiten.php');
} else {
    echo 'mislukt';
}