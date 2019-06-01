<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 01.06.2019
 * Time: 13:43
 * Mail: cuber116@gmail.com
 */

global $APPLICATION;
$APPLICATION->setTitle('Авторизоваться');

?>
<div class="login-bg">
  <div class="container">
    <div class="login-page">
      <div class="login-block">
        <h1>Авторизоваться</h1>
        <form action="/cub-admin/checkPost.php"
              data-form-login
              class="loginForm">
          <label for="">
            Логин:
            <input type="text"
                   required
                   name="user"/>
          </label>
          <br/>
          <label for="">
            Пароль:
            <input type="password"
                   required
                   name="pass"/>
          </label>
          <br/>
          <input type="submit"
                 name="submit"
                 value="Войти"/>
        </form>
      </div>
    </div>
  </div>
</div>