<?php 
require_once('../../database/insert.php');
class Add_user extends Insert{
  public function addUser($x){
    $info = json_decode(json_encode($x), true);
    // print_r(array_keys($info));
    try {
      $this->insert('users', $info);
      exit('inserted');
    } catch (Exception $e) {
      exit($e->getMessage());
    }
  }
}

$add_user = new Add_user();
$add_user->addUser($_POST);