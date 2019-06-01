<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 14:29
 * Mail: cuber116@gmail.com
 */

global $admin;
global $APPLICATION;
?>

<?php if($check = $admin->checkAuthorization()): ?>
  <?php $APPLICATION->file_include('/isLogged.php') ?>
<?php else: ?>
  <?php $APPLICATION->file_include('/nonLogged.php') ?>
<?php endif; ?>
