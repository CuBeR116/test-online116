<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 16:13
 * Mail: cuber116@gmail.com
 */

global $admin;
?>

<div class="testsList">
  <div class="container">
    <h1>Список тестов пуст</h1>
    <p>Пожалуйста, подождите, пока не будут созданы новые тесты</p>
    
    <?php if ($check = $admin->checkAuthorization()): ?>
      <p><a href="/new" class="createNewTest">Создать тест</a></p>
    <?php endif; ?>
  </div>
</div>
