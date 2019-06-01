<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 02.05.2019
 * Time: 19:01
 * Mail: cuber116@gmail.com
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
$APPLICATION->setTitle('Пройти тест');

if ($check = $APPLICATION->checkTestExist($_GET['test'])) {
  $APPLICATION->file_include('/passingTest.php');
} else {
  if(count($testsList = $APPLICATION->getTestsList()) === 0) {
    $APPLICATION->file_include('/testsEmpty.php');
  }
  else {
    $APPLICATION->file_include('/testsList.php');
  }
}
?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';
?>

