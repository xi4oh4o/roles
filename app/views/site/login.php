<div id="login">
<form id="login-form" action="/user/vertify" method="post">
    <label for="LoginBoxem">Username</label>
    <input name="username" id="LoginBoxem" type="text" onblur="toolkit.Check.loginNull()">
    <label for="LoginBoxPs">Password</label>
    <input name="password" id="LoginBoxPs" type="password" onblur="toolkit.Check.loginNull()">
    <div class="errorMessage" id="LoginErrorMessage"></div>
    <div class="row buttons">
    <input type="submit" name="loginBtn" value="Login">
    </div>
</form>
</div>
