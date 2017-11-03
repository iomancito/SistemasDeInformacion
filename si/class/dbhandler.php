<?php
class dbhandler{
    
    private $dburl = "localhost";
    private $dbname = "SisInf";
    private $dbuser = "joseluis";
    private $dbpass = "joseluis";
    private $mysqli;
    
    private function connect(){
        $this->mysqli = new mysqli($dburl, $dbuser, $dbpass, $dbname);
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
    }
    
    public function login($email, $pass){
        $this->connect();
        $sql = "SELECT *
			FROM registered_user
			WHERE email = '$email' and password = '$pass'";
        $this->mysqli->query($sql);
        if ($this->mysqli->num_rows == 0)
            echo "No coincidencias";
    }
}