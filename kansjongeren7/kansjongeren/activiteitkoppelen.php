<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
if (!isset($_SESSION['medewerker_id'])) {
    header('Location: index.php');
}
require 'php/jongeren.php';
$jongeren = new Jongeren();

require 'php/activiteit.php';
$activiteit = new Activiteiten();
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
                <a href="">Overzicht activiteiten</a>
                <a href="">Overzicht instituten</a>
                <a href="overzichtjongeren.php">Overzicht jongeren</a>
                <a href="">Overzicht medewerkers</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br> 
      
       <div>
            <h4>Jongere koppelen aan instituut</h4>
            <form method="post" action="formulieren/jongerenkoppelenaanactiviteit.php">
                <label>Selecteer jongere</label>
                <br>
                <select name="id_jongere">
                    <?php
                    $jongeren->getID();
                    ?>
                </select>
                <br>
                <label>Selecteer activiteit</label>
                <br>
                <select name="id_activiteit">
                    <?php
                    $activiteit->getID();
                    ?>
                </select>
                <br>
                <label>Afgerond</label>
                <br>
                <select name="afgerond">
                    <option value="Nee">Nee</option>
                    <option value="Ja">Ja</option>
                </select>
                <input type="submit" value="Jongere koppelen">
            </form>
        </div>
        <div>
            <h4>Overzicht jongeren en activiteit</h4>
            <?php
            $activiteit->overzichtJongerenBijActiviteit();
            ?>
        </div>
                 
    </body>
</html>




