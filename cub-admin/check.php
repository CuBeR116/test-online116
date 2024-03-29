<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 02.05.2019
 * Time: 19:31
 * Mail: cuber116@gmail.com
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once __DIR__ . '/index.php';
  $APPLICATION = new APPLICATION();
  
  $arTest = $APPLICATION->getTest($_POST['test']);
  $result = [];
  $rights = 0;
  $rightText = 'Верно';
  $wrongText = 'Неверно';
  
  if ($_POST['question']) {
    foreach ($_POST['question'] as $key_question => $question) {
      $successResult = 0;
      $questionRight = $APPLICATION->getCountAnswer($arTest['question'][$key_question]['answer']);
      
      $result[$key_question]['name'] = $arTest['question'][$key_question]['name'];
      
      foreach ($question['answer'] as $key_answer => $answer) {
        if ($answer === $arTest['question'][$key_question]['answer'][$key_answer]['right']) {
          $result[$key_question]['answer'][$key_answer] = 'true';
          $successResult++;
        } else {
          $result[$key_question]['answer'][$key_answer] = 'false';
          $successResult = 0;
          break;
        }
      }
      
      if ($questionRight === $successResult) {
        $result[$key_question]['result'] = $rightText;
        $rights++;
      } else {
        $result[$key_question]['result'] = $wrongText;
        
      }
      
    }
  }
  
  if ($_POST['radio']) {
    foreach ($_POST['radio'] as $key_radio => $radio) {
      $result[$key_radio]['name'] = $arTest['question'][$key_radio]['name'];
      
      if ($arTest['question'][$key_radio]['answer'][$radio]['right']) {
        $result[$key_radio]['answer'][$radio] = 'true';
        $result[$key_radio]['result'] = $rightText;
        $rights++;
      } else {
        $result[$key_radio]['answer'][$radio] = 'false';
        $result[$key_radio]['result'] = $wrongText;
      }
    }
  }
  
  echo json_encode([
    'message' => 'Правильных ответов - ' . $rights . ' из ' . count($arTest['question']),
    'result'  => $result,
    'sum' => count($arTest['question'])
  ]);
}
?>