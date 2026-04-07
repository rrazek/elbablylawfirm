<?php
    class Database {
        private static $instance = null;
        private $conn;

        private $HOST="localhost";
        private $USERNAME="root";
        private $PASSWORD="root";
        private $DB_NAME="final";


        private function __construct(){
            $this->connectToDB();
        }

        function connectToDB(){
            $this->conn =mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);
            
            // Check connection
            if($this->conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            return $this->conn;
        }

        static function getInstance (){
            if(!self::$instance)
            {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        function getConnection(){
            return $this->conn;
        }


    }



?>