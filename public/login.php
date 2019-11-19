<?php
  require "../config.php";
  require "../common.php";


if (isset($_POST['location']) && $_POST['location'] && isset($_POST['password']) && $_POST['password']) {
    // do user authentication as per your requirements
    try {

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT *
        FROM users
        WHERE location = :location";

        $location = $_POST['location'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    // based on successful authentication
    echo json_encode(array('success' => $result));
} else {
    echo json_encode(array('success' => 0));
}