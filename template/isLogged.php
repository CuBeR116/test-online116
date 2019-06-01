<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 14:32
 * Mail: cuber116@gmail.com
 */

global $admin;
global $APPLICATION;
?>

<div class="lk">
  <div class="lk__name-div">
    <p class="lk__name-text"><?= $admin->getLogin(); ?></p>
  </div>
  <div class="lk__out-div">
    <a href="/cub-admin/login/logout.php"
       class="lk__out-link">Выйти</a>
  </div>
</div>