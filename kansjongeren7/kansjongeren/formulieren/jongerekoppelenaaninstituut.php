<?php
session_start();
require '../php/instituut.php';
$instituut = new Instituten();

$id_jongere = $_POST['id_jongere'];
$id_instituut = $_POST['id_instituut'];
$startdatum = $_POST['startdatum'];

$koppelen = $instituut->jongereAanmeldenBijInstituut($id_jongere, $id_instituut, $startdatum);

if ($koppelen == true) {
    header('Location: ../instituutkoppelen.php');
} else {
    echo 'mislukt';
}