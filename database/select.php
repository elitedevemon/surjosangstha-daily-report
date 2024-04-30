<?php 
require_once("db.php");
class Select extends Db{
  public function select($table, $rows="*", $join=null, $where=null, $order=null, $limit=null){
    if($this->tableExists($table)){
      $sql = "SELECT $rows FROM $table";
      if($join!=null){
        $sql .= " JOIN $join";
      }
      if($where!=null){
        $sql .= " WHERE $where";
      }
      if($order!=null){
        $sql .= " ORDER BY $order";
      }
      if($limit!=null){
        $sql .= " LIMIT 0,$limit";
      }
      if($this->mysqli->query($sql)){
        return $this->mysqli->query($sql)->fetch_object();
      }else{
        exit("Connection problem ".$this->mysqli->error);
      }
    }else{
      exit("Table not found");
    }
  }
}