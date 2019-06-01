<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 15:43
 * Mail: cuber116@gmail.com
 */

global $APPLICATION;
$arTest = $APPLICATION->getTest($_GET['test']);

?>


<div class="container">
  <h1><?= $arTest['name'] ?></h1>
  <div class="progressBar-block">
    <div class="progressBar-title">
      <h2 class="progressBar-title__value">Выполнено:
        <span data-progress-processing>0</span> из <?= count($arTest['question']) ?></h2>
    </div>

    <div class="progressBar-finish"
         data-progress-sum="<?= count($arTest['question']) ?>">
      <div class="progressBar-processing"
           data-progress-bar></div>
    </div>
  </div>
  <form data-answer>
    <input type="hidden"
           name="test" value="<?= $_GET['test'] ?>">
    <?php foreach ($arTest['question'] as $key_question => $question): ?>
      <?php $next = next($arTest['question']); ?>

      <div class="question-block"
           data-question-id="<?= $key_question ?>">
        <h3><?= $question['name'] ?></h3>
        
        <?php $boolType = $APPLICATION->getTypeAnswer($question['answer']) ?>
        
        <?php foreach ($question['answer'] as $key_answer => $answer): ?>
          <div class="w-100 question__answer">
            <input id="question[<?= $key_question ?>][<?= $key_answer ?>]"
              <?php if ($boolType): ?>
                name="question[<?= $key_question ?>][answer][<?= $key_answer ?>]"
                value="true"
              <?php else: ?>
                name="radio[<?= $key_question ?>]"
                value="<?= $key_answer ?>"
              <?php endif; ?>
                   type="<?= $boolType ? 'checkbox' : 'radio' ?>">
            <label for="question[<?= $key_question ?>][<?= $key_answer ?>]">
              <?= $answer['value'] ?></label>
          </div>
        <?php endforeach; ?>
        
        <?php if ($next === next($arTest['question']) && count($arTest['question']) > 1): ?>
          <button type="button"
                  class="question-prev"
                  data-prev-question="<?= $key_question - 1 ?>">
            Предыдущий вопрос
          </button>
        <?php endif; ?>
        
        <?php if ($question !== end($arTest['question'])): ?>
          <button type="button"
                  class="question-next"
                  data-next-question="<?= $key_question + 1 ?>">
            Следующий вопрос
          </button>
        <?php endif; ?>
        
        <?php if ($question === end($arTest['question'])): ?>

          <div class="questionSubmit-block">
            <input type="submit"
                   class="questionSubmit-input"
                   value="Закончить тест">
          </div>
        
        <?php endif; ?>

      </div>
    <?php endforeach; ?>

  </form>

  <div class="questionResult-block"
       data-result></div>
</div>

<div class="testsListBack">
  <div class="container">
    <div class="testsListBack-block">
      <p class="testsListBack-text">
        <a href="/"
           class="testsListBack-link">Вернуться к выбору тестов</a>
      </p>
    </div>
  </div>
</div>