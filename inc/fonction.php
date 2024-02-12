<?php 
    require_once("connection.php");

    // null si tsy misy
    function checkLoging($username,$mdp){
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("SELECT * FROM tea_user WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
        
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($user && strcmp($mdp, $user['mdp']) == 0) {
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            print "Erreur ! : " . $e->getMessage();
            die();
        }
    }

    function calculsalaire($nbj,$tauxJour){
        return $nbj * $tauxJour;
    }
    function nombrejourOuvrable($dateDebut, $dateFin) {
    
        // Convertir les chaînes de date en objets DateTime
        $dateDebutObj = new DateTime($dateDebut);
        $dateFinObj = new DateTime($dateFin);
    
        // Initialiser un compteur pour les jours ouvrables
        $nombreJoursOuvrables = 0;
    
        // Parcourir chaque jour entre la date de début et la date de fin
        while ($dateDebutObj <= $dateFinObj) {
            // Vérifier si le jour actuel n'est pas un week-end (samedi ou dimanche)
            if ($dateDebutObj->format('N') < 6) { // 'N' retourne le jour de la semaine (1 pour lundi, 7 pour dimanche)
                $nombreJoursOuvrables++;
            }
    
            // Ajouter un jour à $dateDebutObj
            $dateDebutObj->modify('+1 day');
        }
    
        return $nombreJoursOuvrables;
    }
    
?>