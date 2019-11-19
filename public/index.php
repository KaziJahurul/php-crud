
<?php include "templates/header.php"; ?>

    <form id="loginform" method="post">
        <div>
            Username:
            <input type="text" name="location" id="username" />
            Password:
            <input type="password" name="password" id="password" />    
            <input type="submit" name="loginBtn" id="loginBtn" value="Login" />
        </div>
    </form>

    <ul>
        <li>
            <a href="create.php"><strong>Create</strong></a> - add a user
        </li>
        <li>
            <a href="read.php"><strong>Read</strong></a> - find a user
        </li>
        <li>
            <a href="update.php"><strong>Update</strong></a> - edit a user
        </li>
        <li>
            <a href="delete.php"><strong>Delete</strong></a> - delete a user
        </li>
    </ul>

<?php include "templates/footer.php"; ?>