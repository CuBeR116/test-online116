<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
$APPLICATION->setTitle('Создать тест');

?>

<div class="container">
  <h1>Создание теста</h1>

  <form data-create>
    <label for="testName">
      Введите название теста
      <input type="text"
             name="name"
             id="testName">
    </label>


    <input type="submit"
           value="Создать">
  </form>

  <div class="row">
    <div class="col-12">
      <button type="button"
              onclick="addQuestion($(this))">Добавить вопрос
      </button>
    </div>
  </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';
?>
