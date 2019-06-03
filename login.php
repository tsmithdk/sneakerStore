<?php
$sLinkToCss = 'login.css';
$sLinkToJs = 'login.js';
require_once __DIR__.'/components/top.php';
?>

<div id="containerLogin">
Admin login is: email = a@a.com and password = A1b2c3 <br>
User login is: email = b@b.com and password = 123456
    <form id="frmLogin">
        <div id="wrapperLogin">
          <?php
          if(!($_GET['message'])){
          ?>
          <h1>Login</h1>
          <hr>
          <?php
          }else{
          ?>
          <div class="containerGoodSignupTitle">
            <h1>Congratulation!</h1>
            <h3>You have Signed Up!</h3>
            <h6>Please Login</h6>
          </div>
          <?php
          }
          ?>

      <div class="boxInput">
        <div id="invalidEmail" class="invalid">invalid email</div>
        <div>Email <input id="txtEmail" name="txtEmail" type="text" value="a@a.com" placeholder="email">
      </div></div>

      <div class="boxInput">
      <div id="invalidPassword" class="invalid">invalid password</div>
       <div> Password <input id="txtPassword" name="txtPassword" type="text" value="A1b2c3" placeholder="password ( 6 to 20 characters )" maxlength="20">
      </div></div>


      <button id="btnLogin" type="submit" class="ok">Login</button>
        </div>

        <a class="signupLink" href="signup.php">Don't have an account? Signup here</a>
    </form>

  </div>


<?php require_once __DIR__.'/components/bottom.php'; ?>