<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 13:28
 * Mail: cuber116@gmail.com
 */

ob_start();
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/cub-admin/index.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/cub-admin/logIn.php';

global $admin;
$admin = new logIn();

global $APPLICATION;
$APPLICATION = new APPLICATION();


$APPLICATION->include_css('/cub-admin/login/css/bootstrap.min.css');
$APPLICATION->include_css('/cub-admin/login/css/template.css');

$APPLICATION->include_js('/cub-admin/login/js/jquery-3.2.1.min.js');
$APPLICATION->include_js('/cub-admin/login/js/template.js');
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible"
        content="ie=edge">
  <title><?= $APPLICATION->getTitle(); ?></title>
  <?php $APPLICATION->echoIncludedCSS() ?>

</head>
<body>