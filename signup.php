<?php
$sLinkToCss = 'login.css';
$sLinkToJs = 'signup.js';
require_once __DIR__.'/components/top.php';
// ini_set('display_errors', 1);
?>

<div id="containerSignup">
    <form id="frmSignup">
        <div id="wrapperSignup">
        <h1>Signup</h1>
        <hr>
            <div class="wrapperInput">
                <div class="boxInput">
                    <div id="invalidName" class="invalid">invalid name</div>
                    <div><label>Name:</label><input id="txtName" name="txtName" type="text" value="a123" placeholder="Name"></div>
                </div>
                <div class="boxInput">
                    <div id="invalidLastName" class="invalid">invalid last name</div>
                    <div><label>Last Name:</label> <input id="txtLastName" name="txtLastName" type="text" value="b123" placeholder="Last Name"></div>
                </div>
            </div>
            <div class="boxInput">
                <div id="invalidAddress" class="invalid">invalid address</div>
                <div><label>Address:</label> <input id="txtAddress" name="txtAddress" type="text" value="street 1" placeholder="Address"></div>
            </div>
            <div class="wrapperInput">
                <div class="boxInput">
                    <div id="invalidCity" class="invalid">invalid city</div>
                    <div><label>City:</label> <input id="txtCity" name="txtCity" type="text" value="cityname" placeholder="City"></div>
                </div>
                <div class="boxInput">
                    <div id="invalidZipCode" class="invalid">invalid ZipCode</div>
                    <div><label>ZipCode:</label> <input id="txtZipcode" name="txtZipcode" type="text" value="9999" placeholder="ZipCode"></div>
                </div>
            </div>
            <div class="boxInput">
                <div id="invalidEmail" class="invalid">invalid Email</div>
                <div><label>Email:</label> <input id="txtEmail" name="txtEmail" type="text" value="test@email.com" placeholder="Email"></div>
            </div>
            <div class="wrapperInput">
                <div class="boxInput">
                    <div id="invalidPassword" class="invalid">invalid Password</div>
                    <div><label>Password:</label> <input id="txtPassword" name="txtPassword" type="text" value="test@Password.com" placeholder="password ( 6 to 20 characters )" maxlength="20"></div>
                </div>
                <div class="boxInput">
                    <div id="invalidConfirmPassword" class="invalid">invalid Confirmation of Password</div>
                    <div><label>Confirm Password:</label> <input id="txtConfirmPassword" type="text" value="test@ConfirmPassword.com" placeholder="ConfirmPassword ( 6 to 20 characters )" maxlength="20"></div>
                </div>
            </div>
            <div class="boxInput">
                <div class="containerSubscribe">
                    <input id="txtNewsletter" name="txtNewsletter" type="checkbox" >
                    <label>Subscribe to newsletter </label>
                </div>
            </div>



            <button id="btnSignup" type="button">Signup</button>
        </div>
            <a class="signupLink" href="login.php">Already have an account? Login here</a>
    </form>

  </div>




<?php require_once __DIR__.'/components/bottom.php'; ?>
