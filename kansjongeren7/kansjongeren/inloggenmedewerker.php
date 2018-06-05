<?php
session_start();

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
               
                
                
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        
        <div>        
            <h2>Login medewerker</h2>
            <form method="post" action="formulieren/inlogformuliermedewerker.php">
                Email:<br>
                <input type="text" name="Email" required>
                <br>
                Wachtwoord:<br>
                <input type="password" name="Wachtwoord" required>
                <br><br>
                <input type="submit" value="login">
            </form> 
        </div>
        
    </body>
</html>

