<div id="login">
<form id="login-form" action="/user/login" method="post">
    <label for="Username">Username</label>
    <input name="username" id="Username" type="text">
    <div class="errorMessage" id="UserErrorMessage"></div>

    <label for="Password">Password</label>
    <input name="password" id="Password" type="password">
    <div class="errorMessage" id="PassErrorMessage"></div>

    <div class="row buttons">
    <input type="submit" name="loginBtn" value="Login">
    </div>
</form>
</div>
