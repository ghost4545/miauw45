<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
if (!isset($_SESSION['medewerker_id'])) {
    header('Location: index.php');
}
require 'php/jongeren.php';
$jongeren = new Jongeren();
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
            <h4>Jongere aanmaken</h4>
            <form method="post" action="formulieren/jongerenaanmaken.php">
                <label>voornaam jongere</label>
                <br>
                <input type="text" name="voornaam" required>                
                <br>
                <label>tussenvoegsels jongere</label>
                <br>
                <input type="text" name="tussenvoegsels"> 
                <br>
                <label>achternaam jongere</label>
                <br>
                <input type="text" name="achternaam" required>
                <br>
                <label>geboortedatum jongere</label>
                <br>
                <input type="date" name="geboortedatum"required> 
                <br>
                <label>inschrijfdatum jongere</label>
                <br>
                <input type="date" name="inschrijfdatum"required> 
                <br>             
                <input type="submit" value="Jongere aanmaken">
            </form>
        </div>
        <div>
            <h4>Jongere wijzigen</h4>
            <form method="post" action="formulieren/jongerenwijzigen.php">
                <label>Voer uw gegevens in</label>      
                <br><br>
                <label>Selecteer jongere</label>
                <br>
                <select name="id_jongere">
                    <?php
                    $jongeren->getID();
                    ?>
                </select>
                <br>
                <label>Nieuwe voornaam</label>
                <br>
                <input type="text" name="voornaam" required> 
                <br>
                <label>Nieuwe tussenvoegsels</label>
                <br>
                <input type="text" name="tussenvoegsels">
                <br>
                <label>Nieuwe achternaam</label>
                <br>
                <input type="text" name="achternaam" required> 
                <br>               
                <label>Nieuwe geboortedatum</label>
                <br>
                <input type="date" name="geboortedatum" required> 
                <br>              
                <label>Nieuwe inschrijfdatum</label>
                <br>
                <input type="date" name="inschrijfdatum" required> 
                <br>
                <br>
                <input type="submit" value="Jongere wijzigen">
            </form>
        </div>
        <div>
            <h4>Jongere verwijderen</h4>
            <form method="post" action="formulieren/jongerenverwijderen.php">
                <label>Selecteer jongere</label>
                <br>
                <select name="id_jongere">
                    <?php
                    $jongeren->getID();
                    ?>
                </select>
                <br>
                <input type="submit" value="Jongere verwijderen">
            </form>
        </div>
                 
    </body>
</html>




