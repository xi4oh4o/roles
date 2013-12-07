<div id="login">
<form id="login-form" action="">
    <h3>Welcome Shinetech</h3>
    <p><label for="LoginBoxem">Username</label>
    <input name="username" id="LoginBoxem" type="text" placeholder="demo"></p>
    <p><label for="LoginBoxPs">Password</label>
    <input name="password" id="LoginBoxPs" type="password" onblur="Toolkit.Check.loginNull()"></p>
    <div class="errorMessage" id="LoginErrorMessage"></div>
    <div class="row buttons">
    <input type="button" name="LoginBtn" value=" Log-in " onclick="Ajax.Query.login()">
    </div>
</form>
</div>
