<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
if (!isset($_SESSION['medewerker_id'])) {
    header('Location: index.php');
}
require 'php/activiteit.php';
$activiteiten = new Activiteiten();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        
        <div class="nav">
            <div class="logo">
                <a href="index.php">Logo</a>
            </div>
            <div class="links">
                <a href="overzichtactiviteiten.php">Overzicht activiteiten</a>
                <a href="overzichtinstituten.php">Overzicht instituten</a>
                <a href="overzichtjongeren.php">Overzicht jongeren</a>
                <a href="overzichtmedewerkers.php">Overzicht medewerkers</a>
                <a href="uitloggen.php">Uitloggen</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br> 
      
       <div>
            <h4>Activiteit aanmaken</h4>
            <form method="post" action="formulieren/activiteitaanmaken.php">
                <label>naam</label>
                <br>
                <input type="text" name="naam" required>                
                <br>
                <label>startdatum</label>
                <br>
                <input type="date" name="startdatum" required> 
                <br>
                <label>einddatum</label>
                <br>
                <input type="date" name="einddatum" required>
                <br>             
                <input type="submit" value="Activiteit aanmaken">
            </form>
        </div>
        <div>
            <h4>Activiteit wijzigen</h4>
            <form method="post" action="formulieren/activiteitwijzigen.php">
                <label>Voer uw gegevens in</label>      
                <br><br>
                <label>Selecteer activiteit</label>
                <br>
                <select name="id_activiteit">
                    <?php
                    $activiteiten->getID();
                    ?>
                </select>
                <br>
                <label>Nieuwe naam</label>
                <br>
                <input type="text" name="naam" required> 
                <br>
                <label>Nieuwe startdatum</label>
                <br>
                <input type="date" name="startdatum">
                <br>
                <label>Nieuwe einddatum</label>
                <br>
                <input type="date" name="einddatum" required> 
                <br>
                <br>
                <input type="submit" value="Activiteit wijzigen">
            </form>
        </div>
        <div>
            <h4>Activiteit verwijderen</h4>
            <form method="post" action="formulieren/activiteitverwijderen.php">
                <label>Selecteer activiteit</label>
                <br>
                <select name="id_activiteit">
                    <?php
                    $activiteiten->getID($id);
                    ?>
                </select>
                <br>
                <input type="submit" value="Activiteit verwijderen">
            </form>
        </div>
                 
    </body>
</html>




