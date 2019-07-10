<?php

class DatabaseConnection {
        
    public function connection() {
        $databaseHost = 'localhost';
        $databaseName = 'hospApoitment';
        $databaseUsername = 'hospApoitment';
        $databasePassword = 'hospApoitment';

        $this->cnx =  mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName); 

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    
    public function query($sql) {
        $this->result = mysqli_query($this->cnx,$sql, MYSQLI_STORE_RESULT);
    }
    
    public function __destruct() {
        mysqli_close($this->cnx);
    }

    
}
