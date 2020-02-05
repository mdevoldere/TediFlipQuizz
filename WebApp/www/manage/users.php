<h2>User Managment</h2>
<p>Here you can view the list of users, modify and delete them. At the bottom of the page, you can add new ones.</p>

<h3>User List</h3>
<table>
    <tr>
        <th>User Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
<?php
    $accounts = new Models\AccountManager;

    foreach($accounts->getAccounts() as $user) {
    ?>
    <tr>
        <td><?php echo $user['username']; ?></td>
        <td><?=$user['email']; ?></td>
        <td>
            <a href="#>">Edit</a>

          | <a href="#" data-username="<?=$user['username']; ?>">Delete</a>
        </td>
    </tr>
    <?php
    }
?>
</table>


<h3>Add User</h3>
<?php

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