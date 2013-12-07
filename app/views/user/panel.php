<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Roles 》User Panel</title>
    <script src="/<?php echo ASSETS_PATH; ?>js/lib.js"></script>
    <link rel="stylesheet" href="/<?php echo ASSETS_PATH; ?>css/style.css">
</head>
<body>
    <div id="container">
    <table id="users">
        <tr>
            <td>Not query to the data</td>
        </tr>
    </table>
    </div>
    <a href="/user/logout"><input type="button" name="logout" id="logoutBtn" value=" Logout " /></a>
    <!-- fetch user list -->
    <script type="text/javascript" charset="utf-8">
        Ajax.Query.userList();
    </script>
</body>
</html>
