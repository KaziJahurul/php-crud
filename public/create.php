<?php

/**
  * Use an HTML form to create a new entry in the
  * users table.
  *
  */

  require "../config.php";
  require "../common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try {
		$connection = new PDO($dsn, $username, $password, $options);

		$new_user = array(
		"firstname" => $_POST['firstname'],
		"lastname"  => $_POST['lastname'],
		"email"     => $_POST['email'],
		"age"       => $_POST['age'],
		"location"  => $_POST['location']
		);

		$sql = sprintf(
			"INSERT INTO %s (%s) values (%s)",
			"users",
			implode(", ", array_keys($new_user)),
			":" . implode(", :", array_keys($new_user))
		);

		$statement = $connection->prepare($sql);
		$statement->execute($new_user);

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}

}
?>


<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  > <?php echo $_POST['firstname']; ?> successfully added.
<?php } ?>

<h2>Add a user</h2>

    <form method="post">
		<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    	<label for="firstname">First Name</label>
    	<input type="text" name="firstname" id="firstname" required>
    	<label for="lastname">Last Name</label>
    	<input type="text" name="lastname" id="lastname" required>
    	<label for="email">Email Address</label>
    	<input type="text" name="email" id="email" required>
    	<label for="age">Age</label>
    	<input type="text" name="age" id="age" required>
    	<label for="location">Location</label>
    	<input type="text" name="location" id="location" required>
    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>


<?php include "templates/footer.php"; ?>