<?php
session_start();
require '../php/instituut.php';
$instituten = new Instituten();

$naam = $_POST['naam'];
$telefoon = $_POST['telefoon'];

$aanmaken = $instituten->instituutAanmaken($naam, $telefoon);

if ($aanmaken == true) {
    header('Location: ../overzichtinstituten.php');
} else {
    echo 'mislukt';
}
?>