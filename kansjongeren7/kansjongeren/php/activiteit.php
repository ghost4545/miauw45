<?php

class Activiteiten {
    
    private function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=kansrijk", $username, $password);
        
        return $conn;
    }
    
    public function activiteitAanmaken($naam, $startdatum, $einddatum) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("INSERT INTO activiteit (naam, startdatum, einddatum) VALUES (:naam, :startdatum, :einddatum)");
        $stmt->bindPAram(':naam', $naam);
        $stmt->bindPAram(':startdatum', $startdatum);
        $stmt->bindPAram(':einddatum', $einddatum);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function activiteitWijzigen($id, $naam, $startdatum, $einddatum) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("UPDATE activiteit SET naam = :naam, startdatum = :startdatum, einddatum = :einddatum WHERE id_activiteit = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':startdatum', $startdatum);
        $stmt->bindParam(':einddatum', $einddatum);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function activiteitVerwijderen($id) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("DELETE FROM activiteit WHERE id_activiteit = :id");
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
        $stmt = $conn->prepare("SELECT * FROM activiteit");
        // Als query is gelukt... anders false terugsturen
        if ($stmt->execute()) {
            // Voor elke gevonden rij het artikel id en de artikelnaam weergeven in een HTML option
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id_activiteit'] . '">' . $row['naam'] . ' ' . $row['startdatum'] . ' ' . $row['einddatum'] . '</option>';
            }
        } else {
            return false;
        }
    }
    
    public function jongereAanmeldenBijActiviteit($id_jongere, $id_activiteit, $afgerond) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("INSERT INTO jongeren_activiteit (id_jongere, id_activiteit, afgerond) VALUES (:id_jongere, :id_activiteit, :afgerond)");
        $stmt->bindParam(':id_jongere', $id_jongere);
        $stmt->bindParam(':id_activiteit', $id_activiteit);
        $stmt->bindParam(':afgerond', $afgerond);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function jongereActiviteitStatusWijzigen($id_jongere, $id_activiteit, $afgerond) {
        $conn = $this->connect();
        
        $stmt = $conn->prepare("UPDATE jongeren_activiteit SET afgerond = :afgerond WHERE id_jongere = :id_jongere AND id_activiteit = :id_activiteit");
        $stmt->bindParam(':id_jongere', $id_jongere);
        $stmt->bindParam(':id_activiteit', $id_activiteit);
        $stmt->bindParam(':afgerond', $afgerond);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function overzichtJongerenBijActiviteit() {
        $conn = $this->connect();
        
        $stmt1 = $conn->prepare("SELECT * FROM jongeren_activiteit");
        if ($stmt1->execute()) {
            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                $id_jongere = $row1['id_jongere'];
                $id_activiteit = $row1['id_activiteit'];
                $stmt2 = $conn->prepare("SELECT * FROM jongere WHERE id_jongere = :id");
                $stmt2->bindParam(':id', $id_jongere);
                $stmt3 = $conn->prepare("SELECT * FROM activiteit WHERE id_activiteit = :id");
                $stmt3->bindParam(':id', $id_activiteit);
                if ($stmt2->execute() && $stmt3->execute()) {
                    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                    $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                    
                    echo '<p>';
                    echo $row2['voornaam'] . ' ' . $row2['tussenvoegsels'] . ' ' . $row2['achternaam'] . ' ' . $row2['geboortedatum'] . ' ' . $row2['inschrijfdatum'];
                    echo '<br>';
                    echo $row3['naam'] . ' ' . $row3['startdatum'] . ' ' . $row3['einddatum'] . ' ' . $row1['afgerond'];
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

?>