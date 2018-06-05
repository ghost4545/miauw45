<?php
session_start();
require '../php/medewerker.php';
$medewerkers = new Medewerkers();

$email = $_POST['Email'];
$wachtwoord = $_POST['Wachtwoord'];

$inloggen = $medewerkers->medewerkerLogin($email, $wachtwoord);

if ($inloggen == true) {
    header('Location: ../overzichtmedewerkers.php');
} else {
    echo 'mislukt';
}


