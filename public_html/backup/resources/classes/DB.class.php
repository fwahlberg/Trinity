<?php
class DB {
        public static $host = "46.32.240.41";
        public static $dbName = "black-ofv-u-215864";
        public static $username = "black-ofv-u-215864";
        public static $password = "2/TUyz.ET";
        public static $port = "3306";


        public static function connect() {
                $pdo = new PDO("mysql:host=".self::$host."; port=".self::$port."; dbname=".self::$dbName.";charset=utf8", self::$username, self::$password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        }
        public static function query($query, $params = array()) {
                $statement = self::connect()->prepare($query);
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $statement->execute($params);
                if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetch();
                return $data;
                }
        }

        public static function queryAll($query, $params = array()) {
                $statement = self::connect()->prepare($query);
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $statement->execute($params);
                if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
                }
        }

        public static function queryObject($query, $params = array()) {
                $statement = self::connect()->prepare($query);
                $statement->setFetchMode(PDO::FETCH_CLASS, get_called_class());
                $statement->execute($params);
                if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetch();
                return $data;
                }
        }

        public static function queryAllObjects($query, $params = array()) {
                    $statement = self::connect()->prepare($query);
                    $statement->setFetchMode(PDO::FETCH_CLASS, get_called_class());
                    $statement->execute($params);
                    if (explode(' ', $query)[0] == 'SELECT') {
                    $data = $statement->fetchAll();
                    if(empty($data)){

                    } else{
                      return $data;
                    }
                    }
            }

            public static function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
}
