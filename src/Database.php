<?php
class Database{
    public $serverName;
    public $database;
    public $userName;
    public $password;

    public function __construct($serverName,$database,$userName,$password)
    {
        $this -> serverName = $serverName;
        $this -> database = $database;
        $this -> userName = $userName;
        $this -> password = $password;

        $this -> connect();
    }

    public function connect(){
        try {
            $conn = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->userName, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
    }
}
?>