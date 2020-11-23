<?php

    class DB{
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;

        public function __construct(){
            $this->host = 'localhost';
            $this->db = 'API_PHP';
            $this->user = 'api_php';
            $this->password = 'GhJ852963';
            $this->charset = 'uft8mb4';
        }

         //concection with PDO
        public function connect(){
            try{
                $connection = "mysql:host=".$this->host.";dbname=".$this->db;

                $pdo = new PDO($connection,$this->user,$this->password, array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ));

                //Begin Transaction
                $pdo->beginTransaction();  
                return $pdo;
            }catch(PDOException $ex){
                echo("Error".$ex->getMessage());
            }
        }
    }
?>