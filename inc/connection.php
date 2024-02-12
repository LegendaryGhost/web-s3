<?php
    function connection(){
        $user='ETU002547';
        $pass='MP9DzCGc8ipr';
        $dsn='mysql:host=172.10.0.113;port=3306;dbname=..';
        
        static $connection = null;
        if($connection === null){
            try {
                $connection = new PDO($dsn, $user, $pass);
                echo "Connecte";
                
            } catch (PDOException $e) {
                echo "Erreur ! : " . $e->getMessage();
                die();
            }
        }
        return $connection;
    } 
    connection();
?>