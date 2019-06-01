<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 02.05.2019
 * Time: 18:52
 * Mail: cuber116@gmail.com
 */


function rus2translit($string)
{
  $converter = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
    
    'А' => 'A', 'Б' => 'B', 'В' => 'V',
    'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
    'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
    'И' => 'I', 'Й' => 'Y', 'К' => 'K',
    'Л' => 'L', 'М' => 'M', 'Н' => 'N',
    'О' => 'O', 'П' => 'P', 'Р' => 'R',
    'С' => 'S', 'Т' => 'T', 'У' => 'U',
    'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
    'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
    'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
    'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
  ];
  return strtr($string, $converter);
}

function str2url($str)
{
  // переводим в транслит
  $str = rus2translit($str);
  // в нижний регистр
  $str = strtolower($str);
  // заменям все ненужное нам на "-"
  $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
  // удаляем начальные и конечные '-'
  $str = trim($str, "-");
  return $str;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['type'] === 'delete') {
    $filePath = __DIR__ . '/questions/' . $_POST['file'] . '.txt';
    if (file_exists($filePath)) {
      unlink(__DIR__ . '/questions/' . $_POST['file'] . '.txt');
      
      echo json_encode([
        'result' => 'success',
      ]);
    }
    else {
      echo json_encode([
        'result' => 'error',
      ]);
    }
    
  } else {
    $fp = fopen(__DIR__ . '/questions/' . str2url($_POST['name']) . '.txt', 'w');
    fwrite($fp, json_encode($_POST));
    fclose($fp);
    
    echo json_encode([
      'message' => 'Ваш тест был успешно создан',
    ]);
  }
} else {
  exit;
}