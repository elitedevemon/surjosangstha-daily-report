<?php 
require_once("db.php");
class Create_table extends Db{
  private $addField;
  public function createTable($table, $fields=array()){
    if(!$this->tableExists($table)){
      foreach($fields as $field=>$option){
        $this->addField .= $field. ' VARCHAR(100) '. $option.', ';
      }
      $sql = "CREATE TABLE $table (
        id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        $this->addField
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
      if($this->mysqli->query($sql)){
        echo"Table has been created: $table";
      }else{
        echo "Connection problem";
      }
    }else{
      echo"Table already exists";
    }
  }
}
$obj = new Create_table();
$obj->createTable('admin', [
  'username'=> 'NOT NULL UNIQUE',
  'password' => 'NOT NULL',
]);

$obj->createTable('users', [
  'name' => 'NOT NULL',
  'email' => 'NOT NULL UNIQUE',
  'pso_id' => 'NOT NULL UNIQUE',
  'username' => 'NOT NULL UNIQUE',
  'password' => 'NOT NULL'
]);
