<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
if (!isset($_SESSION['medewerker_id'])) {
    header('Location: index.php');
}
require 'php/medewerker.php';
$medewerkers = new Medewerkers();
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
            <h4>Medewerker aanmaken</h4>
            <form method="post" action="formulieren/medewerkeraanmakenformulier.php">
                <label>naam medewerker</label>
                <br>
                <input type="text" name="voornaam"required>                
                <br>
                <label>tussenvoegsels medewerker</label>
                <br>
                <input type="text" name="tussenvoegsels"required>                
                <br>
                <label>achternaam medewerker</label>
                <br>
                <input type="text" name="achternaam"required> 
                <br>
                <label>email medewerker</label>
                <br>
                <input type="text" name="email"required> 
                <br>
                <label>wachtwoord medewerker</label>
                <br>
                <input type="password" name="wachtwoord"required> 
                <br><br>     
                <input type="submit" value="Medewerker aanmaken">
            </form>
        </div>
        <div>
            <h4>Medewerkeraccount wijzigen</h4>
            <form method="post" action="formulieren/medewerkerwijzigenformulier.php">
                <label>Voer uw gegevens in</label>      
                <br><br>
                <label>Selecteer medewerker</label>
                <br>
                <select name="id_medewerker">
                    <?php
                    $medewerkers->getID();
                    ?>
                </select>
                <br>
                <label>Nieuwe voornaam</label>
                <br>
                <input type="text" name="voornaam" required> 
                <br>
                <label>Tussenvoegsels medewerker</label>
                <br>
                <input type="text" name="tussenvoegsels"required>                
                <br>
                <label>Nieuwe achternaam</label>
                <br>
                <input type="text" name="achternaam" required> 
                <br>               
                <label>Nieuwe email</label>
                <br>
                <input type="email" name="email" required> 
                <br>              
                <label>Nieuwe wachtwoord</label>
                <br>
                <input type="password" name="wachtwoord" required> 
                <br>
                <br>
                <input type="submit" value="account wijzigen">
            </form>
        </div>
        <div>
            <h4>Account verwijderen</h4>
            <form method="post" action="formulieren/medewerkerverwijderenformulier.php">
                <label>Selecteer medewerker</label>
                <br>
                <select name="id_medewerker">
                    <?php
                    $medewerkers->getID();
                    ?>
                </select>
                <br>
                <input type="submit" value="Account verwijderen">
            </form>
        </div>
                 
    </body>
</html>




