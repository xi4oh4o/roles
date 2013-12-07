<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Roles 》Delete user</title>
    <script src="/<?php echo ASSETS_PATH; ?>js/lib.js"></script>
    <link rel="stylesheet" href="/<?php echo ASSETS_PATH; ?>css/style.css">
</head>
<body>
    <div id="container">
    <div id="header">
    <h3>Delete user</h3>
    </div>
    <div id="user_list">
    <table id="users">
        <tr>
            <td><?php echo $this->tips; ?></td>
        </tr>
    </table>
    <p>This is a demo page.❤ </p>
    </div>
    </div>
    <a href="/user/logout"><input type="button" name="logout" id="logoutBtn" value=" Logout " /></a>
</body>
</html>
