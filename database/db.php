<?php 
class Db{
  private $db_host = 'localhost';
  private $db_username = 'root';
  private $db_password = '';
  private $db_name = 'dailyreport';
  protected $conn = false;
  protected $mysqli = "";

  public function __construct(){
    if (!$this->conn) {
      $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
      $this->conn = true;
      if ($this->mysqli->connect_error) {
        die("Connection error". $this->mysqli->connect_error);
      }
    }else {
      exit("Connection already established");
    }
  }

  protected function tableExists($table){
    $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows > 0) {
      return true;
    }else{
      echo"Table not found";
      return false;
    }
  }


  public function __destruct() {
    if ($this->conn) {
      if ($this->mysqli->close()) {
        $this->conn = false;
      };
    }else{
      die("Not connected");
    }
  }
  
}