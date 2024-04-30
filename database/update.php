<?php 
require_once("db.php");
class Update extends Db{
  public function update($table, $params=array(), $where=null){
    if($this->tableExists($table)){
      $arguments = array();
      foreach ($params as $key => $value) {
        $arguments[] = "$key = '$value'";
      }

      $sql = "UPDATE $table SET " . implode(", ", $arguments);
      if($where != null){
        $sql .= " WHERE $where";
      }
      if ($this->mysqli->query($sql)) {
        return true;
      }else{
        exit("Connection problem". $this->mysqli->error);
      }
    }
  }
}