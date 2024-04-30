<?php
// print_r($_POST);
require_once('../database/select.php');
class Admin_auth extends Select{
  public function checkAuth($x){
    $info = json_decode(json_encode($x));
    // echo $info->username;
    $admin = $this->select('admin', '*', null, "username = '{$info->username}'");
    if (empty($admin)) {
      exit("wrong credentials");
    }else{
      if ($info->username === $admin->username && $info->password === $admin->password) {
        exit('access granted');
      }else{
        exit('access denied');
      }
    }
  }
}

$admin_auth = new Admin_auth();
$admin_auth->checkAuth($_POST);