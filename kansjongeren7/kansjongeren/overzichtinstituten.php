<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
if (!isset($_SESSION['medewerker_id'])) {
    header('Location: index.php');
}
require 'php/instituut.php';
$instituten = new Instituten();
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
                <a href="instituutkoppelen.php">Instituut koppelen</a>
                <a href="activiteitkoppelen.php">Activiteit koppelen</a>
                <a href="uitloggen.php">Uitloggen</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br> 
      
       <div>
            <h4>Instituut toevoegen</h4>
            <form method="post" action="formulieren/instituutaanmaken.php">
                <label>Naam instituut</label>
                <br>
                <input type="text" name="naam"required> 
                <br>
                <label>Instituut telefoon</label>
                <br>
                <input type="text" name="telefoon"required>   
                <br><br>     
                <input type="submit" value="instituut toevoegen">
            </form>
        </div>
        <div>
            <h4>Instituut wijzigen</h4>
            <form method="post" action="formulieren/instituutwijzigen.php">
                <label>Naam instituut</label>
                <br>
                <select name="id_intstituut">
                    <?php
                    $instituten->getID();
                    ?>
                </select>
                <br>
                <input type="text" name="naam"required>  
                <br>
                <label>Instituut telefoon</label>
                <br>
                <input type="text" name="telefoon"required>   
                <br><br>     
                <input type="submit" value="instituut wijzigen">
            </form>
        </div>
        <div>
            <h4>intituut verwijderen</h4>
            <form method="post" action="formulieren/instituutverwijderen.php">
                <label>Selecteer instituut</label>
                <br>
                <select name="id_instituut">
                    
                    <?php
                    $instituten->getID();
                    ?>
                </select>
                    
                
                <br>
                <input type="submit" value="Instituut verwijderen">
            </form>
        </div>
                 
    </body>
</html>
