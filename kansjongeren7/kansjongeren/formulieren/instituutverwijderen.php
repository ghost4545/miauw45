<?php

// Bestanden importeren
require '../php/instituut.php';

// Class aanroepen en opslaan in variabele
$instituten = new Instituten();

// Inhoud formuliervelden opslaan in variabelen
$id =  $_POST['id_instituut'];

// Functie uitvoeren en resultaat opslaan in vaiabele
$verwijderen = $instituten->instituutVerwijderen($id);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($verwijderen == true) {
    header('Location: ../overzichtinstituten.php');
} else {
    echo 'mislukt';
}