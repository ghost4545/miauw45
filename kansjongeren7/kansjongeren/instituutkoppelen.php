<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
if (!isset($_SESSION['medewerker_id'])) {
    header('Location: index.php');
}
require 'php/jongeren.php';
$jongeren = new Jongeren();

require 'php/instituut.php';
$instituut = new Instituten();
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
            <h4>Jongere koppelen aan instituut</h4>
            <form method="post" action="formulieren/jongerekoppelenaaninstituut.php">
                <label>Selecteer jongere</label>
                <br>
                <select name="id_jongere">
                    <?php
                    $jongeren->getID();
                    ?>
                </select>
                <br>
                <label>Selecteer instituut</label>
                <br>
                <select name="id_instituut">
                    <?php
                    $instituut->getID();
                    ?>
                </select>
                <br>
                <label>Startdatum</label>
                <br>
                <input type="date" name="startdatum" required>
                <input type="submit" value="Jongere aanmaken">
            </form>
        </div>
        <div>
            <h4>Overzicht jongeren en instituut</h4>
            <?php
            $instituut->overzichtJongerenBijInstituut();
            ?>
        </div>
                 
    </body>
</html>




