<?php

class Jongeren {
    
    private function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=kansrijk", $username, $password);
        
        return $conn;
    }
    
    public function jongereAanmaken($voornaam, $tussenvoegsels, $achternaam, $geboortedatum, $inschrijfdatum) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("INSERT INTO jongere (voornaam, tussenvoegsels, achternaam, geboortedatum, inschrijfdatum) VALUES (:voornaam, :tussenvoegsels, :achternaam, :geboortedatum, :inschrijfdatum)");
        $stmt->bindPAram(':voornaam', $voornaam);
        $stmt->bindPAram(':tussenvoegsels', $tussenvoegsels);
        $stmt->bindPAram(':achternaam', $achternaam);
        $stmt->bindPAram(':geboortedatum', $geboortedatum);
        $stmt->bindPAram(':inschrijfdatum', $inschrijfdatum);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function jongereWijzigen($id, $voornaam, $tussenvoegsels, $achternaam, $geboortedatum, $inschrijfdatum) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("UPDATE jongere SET voornaam = :voornaam, tussenvoegsels = :tussenvoegsels, achternaam = :achternaam, geboortedatum = :geboortedatum, inschrijfdatum = :inschrijfdatum WHERE id_jongere = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindPAram(':voornaam', $voornaam);
        $stmt->bindPAram(':tussenvoegsels', $tussenvoegsels);
        $stmt->bindPAram(':achternaam', $achternaam);
        $stmt->bindPAram(':geboortedatum', $geboortedatum);
        $stmt->bindPAram(':inschrijfdatum', $inschrijfdatum);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function jongereVerwijderen($id) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("DELETE FROM jongere WHERE id_jongere = :id");
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getID() {
        // Connectie maken met de database
        $conn = $this->connect();
        // SQL Query voorbereiden
        $stmt = $conn->prepare("SELECT * FROM jongere");
        // Als query is gelukt... anders false terugsturen
        if ($stmt->execute()) {
            // Voor elke gevonden rij het artikel id en de artikelnaam weergeven in een HTML option
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id_jongere'] . '">' . $row['voornaam'] . ' ' . $row['tussenvoegsels'] . ' ' . $row['achternaam'] . '</option>';
            }
        } else {
            return false;
        }
    }
}