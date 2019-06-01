<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 15:42
 * Mail: cuber116@gmail.com
 */

global $APPLICATION;
global $admin;

$testsList = $APPLICATION->getTestsList();
?>

<div class="testsList">
  <div class="container">
    <h1>Выберите тест:</h1>
    <div class="testsList-block">
      <?php foreach ($testsList as $arTestList): ?>
        <div class="testsList__item-block">
          <p class="testsList__item-text" data-delete-parent>
            <a class="testsList__item-link"
               href='/?test=<?= $arTestList['testFileName'] ?>'>
              <?= $arTestList['testName'] ?>
            </a>
            
            <?php if($check = $admin->checkAuthorization()): ?>
              <button class="removeButton" type="button" data-action="/cub-admin/create.php" data-test-delete="<?= $arTestList['testFileName'] ?>">X</button>
            <?php endif; ?>
            
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>