<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
$APPLICATION->setTitle('Создать тест');

if($check = $admin->checkAuthorization()):
?>

<div class="container">
  <h1>Создание теста</h1>

  <form data-create>

    <div class="question-create__head">
      <label for="testName">
        Введите название теста
        <input type="text"
               name="name"
               required
               id="testName">
      </label>


      <div>
        <input type="submit"
               class="question-create__input"
               value="Создать">
      </div>
    </div>
    <hr/>
  </form>


  <div class="row">
    <div class="col-12 mt-4">
      <button type="button"
              class="addQuestion"
              onclick="addQuestion()">Добавить вопрос
      </button>
    </div>
  </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';
?>
<?php else: ?>
  <?php header('Location: /cub-admin/login/'); ?>
<?php exit(); ?>
<?php endif; ?>
