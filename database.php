<?php
class Database {
    //connection
    protected static $connection;

    public function connect() {
        if(!isset(self::$connection)) {
            $servername = "localhost";
            $db_username = "wbd";
            $db_password = "twinbaldchicken";
            $db_database = "saleproject";
            self::$connection = new mysqli($servername, $db_username, $db_password, $db_database);
        }

        //check connection
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            echo "error";
            return false;
        }
        echo "connect successful";
        return self::$connection;
    }

    public function query($query) {
        $connection = $this->connect();
        $result = $connection->query($query);
        return $result;
    }

    public function select($query) {
        $rows = array();
        $result = $this->query($query);
        //check query result
        if($result === false) {
            return false;
        }
        //put result in array
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function quote($value) {
        $connection = $this -> connect();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}

?>