<?php

    class Conexion{

        protected const DB_SERVER = "localhost";
        protected const DB_USER = "root";
        protected const DB_PASS = "";
        protected const DB_NAME = "tiendita";
        protected const DB_DSN = "mysql:host=".self::DB_SERVER.";dbname=".self::DB_NAME.";charset=utf8mb4";

        protected static ?PDO $db = null;
        protected static $conexiones=0;
        
        public static function conectar(){
            try {
                self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
                // echo "Cree una conexion!";
                // echo ++self::$conexiones;
            } catch (Exception $e) {
                die("No me pude conectar");
            }  
        }

        public static function getConexion(){
            if( self::$db == null ){
                self::conectar();
            }
            return self::$db;
        }
    }