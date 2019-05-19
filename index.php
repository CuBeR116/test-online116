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

$arTest = $APPLICATION->getTest();
?>

<div class="container">
  <h1><?= $arTest['name'] ?></h1>
  <form data-answer>
    <?php foreach ($arTest['question'] as $key_question => $question): ?>
      <h3><?= $question['name'] ?></h3>
      
      <?php $boolType = $APPLICATION->getTypeAnswer($question['answer']) ?>
      
      <?php foreach ($question['answer'] as $key_answer => $answer): ?>
        <div class="w-100">
          <label for="question[<?= $key_question ?>][<?= $key_answer ?>]">
            <?= $answer['value'] ?>
            <input id="question[<?= $key_question ?>][<?= $key_answer ?>]"
              <?php if ($boolType): ?>
                name="question[<?= $key_question ?>][answer][<?= $key_answer ?>]"
                value="true"
              <?php else: ?>
                name="radio[<?= $key_question ?>]"
                value="<?= $key_answer ?>"
              <?php endif; ?>
                   type="<?= $boolType ? 'checkbox' : 'radio' ?>">
          </label>
        </div>
      <?php endforeach; ?>
    
    <?php endforeach; ?>

    <input type="submit"
           value="Закончить тест">
  </form>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';
?>

