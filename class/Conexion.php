<?php

    class Conexion{

        protected const DB_SERVER = "localhost";
        protected const DB_USER = "root";
        protected const DB_PASS = "";
        protected const DB_NAME = "tiendita";
        protected const DB_DSN = "mysql:host=".self::DB_SERVER.";dbname=".self::DB_NAME.";charset=utf8mb4";

        protected PDO $db;

        public function __construct(){
            try {
                $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
            } catch (Exception $e) {
                die("No me pude conectar");
            }  
        }

        public function getConexion(){
            return $this->db;
        }
    }