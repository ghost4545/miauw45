<?php
session_start();
require '../php/activiteit.php';
$activiteiten = new Activiteiten();

$id_jongere = $_POST['id_jongere'];
$id_activiteit = $_POST['id_activiteit'];
$afgerond = $_POST['afgerond'];

$koppelen = $activiteiten->jongereAanmeldenBijActiviteit($id_jongere, $id_activiteit, $afgerond);

if ($koppelen == true) {
    header('Location: ../activiteitkoppelen.php');
} else {
    echo 'mislukt';
}