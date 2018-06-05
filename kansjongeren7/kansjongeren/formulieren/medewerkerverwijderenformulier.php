<?php

// Bestanden importeren
require '../php/medewerker.php';

// Class aanroepen en opslaan in variabele
$medewerkers = new Medewerkers();

// Inhoud formuliervelden opslaan in variabelen
$id =  $_POST['id_medewerker'];

// Functie uitvoeren en resultaat opslaan in vaiabele
$verwijderen = $medewerkers->medewerkerVerwijderen($id);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($verwijderen == true) {
    header('Location: ../overzichtmedewerkers.php');
} else {
    echo 'mislukt';
}