<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 02.05.2019
 * Time: 16:31
 * Mail: cuber116@gmail.com
 */

ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/cub-admin/index.php';
$APPLICATION = new APPLICATION();

$APPLICATION->include_css('/css/bootstrap.min.css');
$APPLICATION->include_css('/css/template.css');

$APPLICATION->include_js('/js/jquery-3.2.1.min.js');
$APPLICATION->include_js('/js/template.js');
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
  <?php $APPLICATION->showHead() ?>
  
</head>
<body>
