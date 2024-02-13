<?php

    function connection(){
        $config = require 'config/base.php';
        
        static $connection = null;
        if ($connection === null) {
            try {
                $dsn = $config['server'] .
                    ':host=' . $config['host'] .
                    (isset($config['port']) ? ';port=' . $config['port'] : '') .
                    ';dbname=' . $config['database'];
    
                $connection = new PDO($dsn, $config['user'], $config['pass']);
            } catch (PDOException $e) {
                print "Erreur ! : " . $e->getMessage();
                die();
            }
        }
        return $connection;
    } 
?>