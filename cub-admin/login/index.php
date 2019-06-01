<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/cub-admin/template/header.php';

if($check = $admin->checkAuthorization()) {
  header('Location: /cub-admin/template/new');
}
else {
  $APPLICATION->includeAdminTemplate('/loginForm.php');
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/cub-admin/template/footer.php';
?>