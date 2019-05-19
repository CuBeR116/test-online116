<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 02.05.2019
 * Time: 16:33
 * Mail: cuber116@gmail.com
 */
?>

<?php
$APPLICATION->showFooter();
?>
</body>
</html>
<?php
$APPLICATION->content = ob_get_contents();
ob_end_clean();

$APPLICATION->showContent();
?>