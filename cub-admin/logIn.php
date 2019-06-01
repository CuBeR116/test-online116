<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 13:36
 * Mail: cuber116@gmail.com
 */

class logIn extends APPLICATION {
  public function checkAuthorization() {
    if($_SESSION['admin'] === 'admin') {
      return true;
    }
    else {
      return false;
    }
  }
  
  public function authorization($post) {
    session_start();
    $pass = md5('admin123');
    $admin = 'admin';
    if($admin == $_POST['user'] && $pass == md5($_POST['pass'])){
      $_SESSION['admin'] = $admin;
      return true;
    }
    else {
      return false;
    }
  }
  
  public function getLogin() {
    return $_SESSION['admin'];
  }
}
?>