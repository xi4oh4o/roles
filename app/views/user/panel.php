<?php $this->is_login ? true : exit; ?>
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
    <div id="header">
    <h3>Users Panel</h3>
    </div>
    <div id="user_list">
    <table id="users">
        <tr>
            <td>Not query to the data</td>
        </tr>
    </table>
    <p>The obtained from Ajax.❤ </p>
    </div>
    </div>
    <a href="/user/logout"><input type="button" name="logout" id="logoutBtn" value=" Logout " /></a>
    <!-- fetch user list -->
    <script type="text/javascript" charset="utf-8">
        Ajax.Query.userList();
    </script>
</body>
</html>
