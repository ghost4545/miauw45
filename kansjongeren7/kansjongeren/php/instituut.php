<?php

class Instituten {
    
    private function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=kansrijk", $username, $password);
        
        return $conn;
    }
    
    public function instituutAanmaken($naam, $telefoon) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("INSERT INTO instituut (naam, telefoon) VALUES (:naam, :telefoon)");
        $stmt->bindPAram(':naam', $naam);
        $stmt->bindPAram(':telefoon', $telefoon);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function instituutWijzigen($id, $naam, $telefoon) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("UPDATE instituut SET naam = :naam, telefoon = :telefoon WHERE id_instituut = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindPAram(':naam', $naam);
        $stmt->bindPAram(':telefoon', $telefoon);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function instituutVerwijderen($id) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("DELETE FROM instituut WHERE id_instituut = :id");
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
        $stmt = $conn->prepare("SELECT * FROM instituut");
        // Als query is gelukt... anders false terugsturen
        if ($stmt->execute()) {
            // Voor elke gevonden rij het artikel id en de artikelnaam weergeven in een HTML option
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id_instituut'] . '">' . $row['naam'] . '</option>';
            }
        } else {
            return false;
        }
    }
    
    public function jongereAanmeldenBijInstituut($id_jongere, $id_instituut, $startdatum) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("INSERT INTO jongeren_instituut (id_jongere, id_instituut, startdatum) VALUES (:id_jongere, :id_instituut, :startdatum)");
        $stmt->bindParam(':id_jongere', $id_jongere);
        $stmt->bindParam(':id_instituut', $id_instituut);
        $stmt->bindParam(':startdatum', $startdatum);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function overzichtJongerenBijInstituut() {
        $conn = $this->connect();
        
        $stmt1 = $conn->prepare("SELECT * FROM jongeren_instituut");
        if ($stmt1->execute()) {
            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                $id_jongere = $row1['id_jongere'];
                $id_instituut = $row1['id_instituut'];
                $stmt2 = $conn->prepare("SELECT * FROM jongere WHERE id_jongere = :id");
                $stmt2->bindParam(':id', $id_jongere);
                $stmt3 = $conn->prepare("SELECT * FROM instituut WHERE id_instituut = :id");
                $stmt3->bindParam(':id', $id_instituut);
                if ($stmt2->execute() && $stmt3->execute()) {
                    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                    $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                    
                    echo '<p>';
                    echo $row2['voornaam'] . ' ' . $row2['tussenvoegsels'] . ' ' . $row2['achternaam'] . ' ' . $row2['geboortedatum'] . ' ' . $row2['inschrijfdatum'];
                    echo '<br>';
                    echo $row3['naam'] . ' ' . $row3['telefoon'] . ' ' . $row1['startdatum'];
                    echo '</p>';
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
}