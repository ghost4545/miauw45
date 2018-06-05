<?php
session_start();
require '../php/jongeren.php';
$jongeren = new Jongeren();

$id = $_POST['id_jongere'];

$verwijderen = $jongeren->jongereVerwijderen($id);

if ($verwijderen == true) {
    header('Location: ../overzichtjongeren.php');
} else {
    echo 'mislukt';
}

?>