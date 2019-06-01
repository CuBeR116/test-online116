<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 02.05.2019
 * Time: 16:33
 * Mail: cuber116@gmail.com
 */
?>

  <footer>
    <div class="footer__links">
      <div class="container">
        <ul>
          <?php foreach ($APPLICATION->getMenu('footer') as $arMenu): ?>
            <li><a href="<?= $arMenu['LINK'] ?>"><?= $arMenu['NAME'] ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="container">
      <?php $APPLICATION->file_include('/authorization.php'); ?>
    </div>
  </footer>

<?php
$APPLICATION->echoIncludedJS();
?>
  </body>
  </html>
<?php
$APPLICATION->content = ob_get_contents();
ob_end_clean();

$APPLICATION->showContent();
?>