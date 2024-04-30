<?php 
require_once("db.php");

class Delete extends Db{
  public function delete($table, $where=null){
    if($this->tableExists($table)){
      $sql = "DELETE FROM ". $table;
      if(!empty($where)){
        $sql .= " WHERE". $where;
      }
      if ($this->mysqli->query($sql)) {
        return true;
      }else{
        exit("Connection problem ".$this->mysqli->error);
      }
    }
  }
}