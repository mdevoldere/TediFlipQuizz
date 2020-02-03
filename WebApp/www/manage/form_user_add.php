<h2>User List</h2>



<h2>Add User</h2>
<?php
session_start();

if(!empty($_SESSION['error'])) {
    echo $_SESSION['error'];
    $_SESSION['error'] = null;
    // unset($_SESSION['error']);
}

if(!empty($_SESSION['success'])) {
    echo $_SESSION['success'];
    $_SESSION['success'] = null;
}

?>
<form method="post" action="form_user_add_save.php">
    <label for="username">User name</label>
    <input type="text" value="" id="username" name="username" required>
    <br>
    <label for="user_password">Password</label>
    <input type="password" value="" id="user_password" name="password" required>
    <br>
    <label for="user_email">Email</label>
    <input type="email" value="" id="user_email" name="email" required>
    <br>
    <button type="submit">Add</button>
</form>