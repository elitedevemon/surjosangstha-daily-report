<?php 
require_once("db.php");

class Insert extends Db{
  public function insert($table, $params=array()){
    if ($this->tableExists($table)) {
      $table_columns = implode(", ", array_keys($params));
      $table_value = implode("', '", array_values($params));
      $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";
      if ($this->mysqli->query($sql)) {
        return true;
      }else{
        exit("Connection problem");
      }
    }
  }
}