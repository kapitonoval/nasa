<?php


/*
* Mysql database class - only one connection alowed

  	example:

  	$db = Database::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = "SELECT foo FROM .....";
    $result = $mysqli->query($sql_query);
*/
if(!class_exists('Database')){
    /*
        пришлось перепроверять на определение класса
        в старой ОС осуществляется несколько подключений данного файла, что ведёт к ошибке

    */


    class Database {
        private $_connection;
        private static $_instance; //The single instance
        private $_host = "localhost";
        private $_username = "root";
        private $_password = "";
        private $_database = "yiinasa";
        /*
        Get an instance of the Database
        @return Instance
        */
        public static function getInstance() {
            if(!self::$_instance) { // If no instance then make one
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        // Constructor
        private function __construct() {
            $this->_connection = new mysqli($this->_host, $this->_username,
                $this->_password, $this->_database);
            $this->_connection->set_charset('utf8');
            // Error handling
            if(mysqli_connect_error()) {
                trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
                    E_USER_ERROR);
            }
        }
        // Magic method clone is empty to prevent duplication of connection
        private function __clone() { }
        // Get mysqli connection
        public function getConnection() {
            return $this->_connection;
        }
        // Close mysqli connection
        public function __destruct(){
            if(isset($this->_connection)){
                mysqli_close($this->_connection);
            }
        }
    }
}

?>