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


    // CRUD The
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

    function getTeaTheById($id) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("SELECT * FROM tea_the");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erreur ! : " . $e->getMessage();
            die();
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


    // CRUD parcelle

    function createParcelle($idThe, $nom, $surface) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("INSERT INTO tea_parcelle (id_the, nom, surface) VALUES (:id_the, :nom, :surface)");
            $stmt->bindParam(':id_the', $idThe);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':surface', $surface);
            $stmt->execute();
            echo "Parcelle créée avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la création de la parcelle : " . $e->getMessage();
            die();
        }
    }

    function getParcelleById($id) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("SELECT * FROM tea_parcelle WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de la parcelle : " . $e->getMessage();
            die();
        }
    }
    
    function getAllParcelles() {
        $pdo = connection();
        try {
            $stmt = $pdo->query("SELECT * FROM tea_parcelle");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des parcelles : " . $e->getMessage();
            die();
        }
    }
    

    function updateParcelle($id, $idThe, $nom, $surface) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("UPDATE tea_parcelle SET id_the = :id_the, nom = :nom, surface = :surface WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_the', $idThe);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':surface', $surface);
            $stmt->execute();
            echo "Parcelle mise à jour avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de la parcelle : " . $e->getMessage();
            die();
        }
    }    


    function deleteParcelle($id) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("DELETE FROM tea_parcelle WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo "Parcelle supprimée avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de la parcelle : " . $e->getMessage();
            die();
        }
    }

    // CRUD Cueilleur 

    function createCueilleur($nom, $genre, $salaire, $dateNaissance) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("INSERT INTO tea_cueilleur (nom, genre, salaire, date_naissance) VALUES (:nom, :genre, :salaire, :date_naissance)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':salaire', $salaire);
            $stmt->bindParam(':date_naissance', $dateNaissance);
            $stmt->execute();
            echo "Cueilleur créé avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la création du cueilleur : " . $e->getMessage();
            die();
        }
    }

    function getCueilleurById($id) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("SELECT * FROM tea_cueilleur WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération du cueilleur : " . $e->getMessage();
            die();
        }
    }
    
    function getAllCueilleurs() {
        $pdo = connection();
        try {
            $stmt = $pdo->query("SELECT * FROM tea_cueilleur");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des cueilleurs : " . $e->getMessage();
            die();
        }
    }

    function updateCueilleur($id, $nom, $genre, $salaire, $dateNaissance) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("UPDATE tea_cueilleur SET nom = :nom, genre = :genre, salaire = :salaire, date_naissance = :date_naissance WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':salaire', $salaire);
            $stmt->bindParam(':date_naissance', $dateNaissance);
            $stmt->execute();
            echo "Cueilleur mis à jour avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour du cueilleur : " . $e->getMessage();
            die();
        }
    }

    function deleteCueilleur($id) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("DELETE FROM tea_cueilleur WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo "Cueilleur supprimé avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du cueilleur : " . $e->getMessage();
            die();
        }
    }


    // CRUD Depense

    function createCategorieDepense($nom) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("INSERT INTO tea_categorie_depense (nom) VALUES (:nom)");
            $stmt->bindParam(':nom', $nom);
            $stmt->execute();
            echo "Catégorie de dépense créée avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la création de la catégorie de dépense : " . $e->getMessage();
            die();
        }
    }

    function getCategorieDepenseById($id) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("SELECT * FROM tea_categorie_depense WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de la catégorie de dépense : " . $e->getMessage();
            die();
        }
    }
    
    function getAllCategoriesDepenses() {
        $pdo = connection();
        try {
            $stmt = $pdo->query("SELECT * FROM tea_categorie_depense");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des catégories de dépenses : " . $e->getMessage();
            die();
        }
    }
    

    function updateCategorieDepense($id, $nom) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("UPDATE tea_categorie_depense SET nom = :nom WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->execute();
            echo "Catégorie de dépense mise à jour avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de la catégorie de dépense : " . $e->getMessage();
            die();
        }
    }

    function deleteCategorieDepense($id) {
        $pdo = connection();
        try {
            $stmt = $pdo->prepare("DELETE FROM tea_categorie_depense WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo "Catégorie de dépense supprimée avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de la catégorie de dépense : " . $e->getMessage();
            die();
        }
    }
    
function getTotal_a_cueillirByParcelle($id){
    $pdo = connection();
    try {
        // Préparation de la requête d'insertion
        $sql = "select total_kg_mois as reste_a_cueillir  from v_infoparcelle where id = :idparcelle";        
        $stmt = $pdo->prepare($sql);
        
        // Liaison des paramètres
        $stmt->bindParam(':idparcelle', $id);
        // Exécution de la requête
        $stmt->execute();
        $donne = $stmt->fetch(PDO::FETCH_ASSOC);
        return $donne;
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de la cueillette : " . $e->getMessage();
        die();
    }
}

// Avoir le reste que l'on peut cueillir dans un parcelle a une date donnée, false si il y aucun cueillete au mois et annee donnée
function getResteACueillirByparcelleBydate($id,$mois,$annee){
    $pdo = connection();
    try {
        // Préparation de la requête d'insertion
        $sql = "select idparcelle,reste_a_cueillir from v_poidsparcelle where idparcelle = :id and mois = :mois and annee = :annee;";
        $stmt = $pdo->prepare($sql);
        
        // Liaison des paramètres
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':mois', $mois);
        $stmt->bindParam(':annee', $annee);
        // Exécution de la requête
        $stmt->execute();
        $donne = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$donne){
            return getTotal_a_cueillirByParcelle($id);
        }
        return $donne;
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de la cueillette : " . $e->getMessage();
        die();
    }
}

function insertIntoTeaCueillette($idCueilleur, $idParcelle, $dateCueillette, $poids) {
    $pdo = connection(); // Assurez-vous que cette fonction retourne votre objet PDO.
    $reponse = array();
    try {
        $dateObject = new DateTime($dateCueillette);

        // Pour récupérer l'année
        $year = $dateObject->format("Y");

        // Pour récupérer le mois
        $month = $dateObject->format("m");
    
        $reste = getResteACueillirByparcelleBydate($idParcelle,$month,$year);
        if($reste['reste_a_cueillir']>$poids){
         // Préparation de la requête d'insertion
            $sql = "INSERT INTO tea_cueillette (id_cueilleur, id_parcelle, date_cueillette, poids) VALUES (:id_cueilleur, :id_parcelle, :date_cueillette, :poids)";
            $stmt = $pdo->prepare($sql);
            
            // Liaison des paramètres
            $stmt->bindParam(':id_cueilleur', $idCueilleur);
            $stmt->bindParam(':id_parcelle', $idParcelle);
            $stmt->bindParam(':date_cueillette', $dateCueillette);
            $stmt->bindParam(':poids', $poids);
            
            // Exécution de la requête
            $stmt->execute();
            $reponse=[
                'succes' => true,
                'message' => 'insertion reussie'
            ];
        }
        else{
            $reponse=[
                'succes' => false,
                'message' => 'Poids superieur au reste dans la parcelle'
            ];
        }
        return $reponse;
       
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de la cueillette : " . $e->getMessage();
        die();
    }
} 

    // la reponse est $variable['TotalCueilli']
    function getTotalPoidsBtwDate($datedebut,$dateFin){
        $pdo = connection();
        try {
            // Préparation de la requête d'insertion
            $sql = "select sum(total_poids_cueilli) as TotalCueilli from v_poidsparcelle where date_cueillette between :dateDebut and :dateFin";
            $stmt = $pdo->prepare($sql);
            
            // Liaison des paramètres
            $stmt->bindParam(':dateDebut', $datedebut);
            $stmt->bindParam(':dateFin', $dateFin);
            // Exécution de la requête
            $stmt->execute();
            $donne = $stmt->fetch(PDO::FETCH_ASSOC);
            return $donne;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la cueillette : " . $e->getMessage();
            die();
        }
    }

    function getTotalPoidsRestant($dateFin){
        $pdo = connection();
        try {
            // Préparation de la requête d'insertion
            $sql = "SELECT 
            vpp.reste_a_cueillir
          FROM 
            v_poidsparcelle vpp
          INNER JOIN (
              SELECT 
                idparcelle, 
                MAX(date_cueillette) AS MaxDate
              FROM 
                v_poidsparcelle
              WHERE 
                date_cueillette <= :datee -- Date de fin spécifiée ici
              GROUP BY 
                idparcelle
          ) vm ON vpp.idparcelle = vm.idparcelle AND vpp.date_cueillette = vm.MaxDate;
          ";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':datee',$dateFin);
            // Exécution de la requête
            $stmt->execute();
            $donne = $stmt->fetch(PDO::FETCH_ASSOC);
            return $donne;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la cueillette : " . $e->getMessage();
            die();
        }
    }

    // la reponse est $variable['prixRevient']
    function getPrixDeRevient($dateDebut,$dateFin){
        $pdo = connection();
        try {
            // Préparation de la requête d'insertion
            $sql = "select sum(montant) as prixRevient from tea_depense where date_depense between :dateD and :dateF";
            $stmt = $pdo->prepare($sql);
            
            // Liaison des paramètres
            $stmt->bindParam(':dateD', $dateDebut);
            $stmt->bindParam(':dateF', $dateFin);
            // Exécution de la requête
            $stmt->execute();
            $donne = $stmt->fetch(PDO::FETCH_ASSOC);
            return $donne;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la cueillette : " . $e->getMessage();
            die();
        }
    }
?>