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

    function createTeaThe($nom, $occupation, $rendementMensuel) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("INSERT INTO tea_the (nom, occupation, rendement_mensuel) VALUES (:nom, :occupation, :rendementMensuel)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':occupation', $occupation);
            $stmt->bindParam(':rendementMensuel', $rendementMensuel);
            $stmt->execute();
            echo "Nouvelle entrée créée avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la création : " . $e->getMessage();
        }
    }

    function updateTeaThe($id, $nom, $occupation, $rendementMensuel) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("UPDATE tea_the SET nom = :nom, occupation = :occupation, rendement_mensuel = :rendement_mensuel WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':occupation', $occupation);
            $stmt->bindParam(':rendement_mensuel', $rendementMensuel);
            $stmt->execute();
            echo "Enregistrement mis à jour avec succès.";
        } catch (PDOException $e) {
            echo "Erreur ! : " . $e->getMessage();
            die();
        }
    }

    function deleteTeaThe($id) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("DELETE FROM tea_the WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo "Enregistrement supprimé avec succès.";
        } catch (PDOException $e) {
            echo "Erreur ! : " . $e->getMessage();
            die();
        }
    }
    
    
    
    
?>