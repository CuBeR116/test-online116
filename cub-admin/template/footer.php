<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 13:28
 * Mail: cuber116@gmail.com
 */
?>


<footer>
  <div class="footer__links">
    <div class="container">
    </div>
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
