<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 14:20
 * Mail: cuber116@gmail.com
 */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') die();

require_once $_SERVER['DOCUMENT_ROOT'] . '/cub-admin/index.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/cub-admin/logIn.php';

global $admin;
$admin = new logIn();

global $APPLICATION;
$APPLICATION = new APPLICATION();

if ($check = $admin->authorization($_POST)) {
  echo json_encode([
    'result' => 'success',
    'url'   => '/new',
  ]);
} else {
  echo json_encode([
    'result' => 'error',
    'errorTitle' => 'Ошибка!',
    'errorText' => 'Логин или пароль неверные',
  ]);
}