<div id="login">
<form id="login-form" action="">
    <label for="LoginBoxem">Username</label>
    <input name="username" id="LoginBoxem" type="text" onblur="Toolkit.Check.loginNull()">
    <label for="LoginBoxPs">Password</label>
    <input name="password" id="LoginBoxPs" type="password" onblur="Toolkit.Check.loginNull()">
    <div class="errorMessage" id="LoginErrorMessage"></div>
    <div class="row buttons">
    <input type="button" name="LoginBtn" value=" Login " onclick="Ajax.Query.login()">
    </div>
</form>
</div>
