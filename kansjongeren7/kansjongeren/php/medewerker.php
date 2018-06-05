<?php
class Medewerkers {
    
    private function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=kansrijk", $username, $password);
        
        return $conn;
    }
    
    public function medewerkerAanmaken($naam, $tussenvoegsels, $achternaam, $email, $wachtwoord) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("INSERT INTO medewerker (voornaam, tussenvoegsels, achternaam, email, wachtwoord) VALUES (:naam, :achternaam,:tussenvoegsels, :email, :wachtwoord)");
        $stmt->bindParam(':naam',$naam);      
        $stmt->bindParam(':tussenvoegsels',$tussenvoegsels);
        $stmt->bindParam(':achternaam',$achternaam);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':wachtwoord',$wachtwoord);
        // als query is gelukt, true terugsturen, anders false terugsturen
        if($stmt->execute()){
            return true;          
        }else{
            return false;
        }
        
    }
    
    public function medewerkerWijzigen($id, $naam, $tussenvoegsels, $achternaam, $email, $wachtwoord) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("UPDATE medewerker SET voornaam = :naam, tussenvoegsels = :tussenvoegsels, achternaam = :achternaam, email = :email, wachtwoord = :wachtwoord  WHERE id_medewerker = :id");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':naam',$naam);  
        $stmt->bindParam(':tussenvoegsels',$tussenvoegsels);
        $stmt->bindParam(':achternaam',$achternaam);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':wachtwoord',$wachtwoord);
        // als query is gelukt, true terugsturen, anders false terugsturen
        if($stmt->execute()){
            return true;          
        }else{
            return false;
        }
    }
    
    public function medewerkerVerwijderen($id) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("DELETE FROM medewerker WHERE id_medewerker = :id");
        $stmt->bindParam(':id',$id);
        // als query is gelukt, true terugsturen, anders false terugsturen
        if($stmt->execute()){
            return true;          
        }else{
            return false;
        }
    }
    
    public function medewerkerLogin($email, $wachtwoord) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("SELECT * FROM medewerker WHERE email = :email AND wachtwoord = :wachtwoord");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':wachtwoord', $wachtwoord);
        // als query is gelukt, gegevens ophalen en terugsturen, anders false terugsturen
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['medewerker_id'] = $result['id_medewerker'];
            $_SESSION['medewerker_voornaam'] = $result['voornaam'];
            $_SESSION['medewerker_tussenvoegsels'] = $result['tussenvoegsels'];
            $_SESSION['medewerker_achternaam'] = $result['achternaam'];
            $_SESSION['medewerker_email'] = $result['email'];
            return true;
        } else {
            return false;
        }
    }
    
    public function getID() {
        // Connectie maken met de database
        $conn = $this->connect();
        // SQL Query voorbereiden
        $stmt = $conn->prepare("SELECT * FROM medewerker");
        // Als query is gelukt... anders false terugsturen
        if ($stmt->execute()) {
            // Voor elke gevonden rij het artikel id en de artikelnaam weergeven in een HTML option
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id_medewerker'] . '">' . $row['voornaam'] . ' ' . $row['achternaam'] . '</option>';
            }
        } else {
            return false;
        }
    }
    
}