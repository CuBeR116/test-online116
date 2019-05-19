<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 02.05.2019
 * Time: 18:52
 * Mail: cuber116@gmail.com
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fp = fopen(__DIR__ . '/questions/file.txt', 'w');
  fwrite($fp, json_encode($_POST));
  fclose($fp);
  
  echo json_encode([
    'message'=> 'Ваш тест был успешно создан',
  ]);
}
else {
  exit;
}