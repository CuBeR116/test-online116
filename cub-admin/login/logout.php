<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 14:40
 * Mail: cuber116@gmail.com
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/cub-admin/index.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/cub-admin/logIn.php';

global $admin;
$admin = new logIn();

global $APPLICATION;
$APPLICATION = new APPLICATION();
session_start();

session_destroy();
$url = $_SERVER['HTTP_REFERER'];

header("Location: $url");
?>
