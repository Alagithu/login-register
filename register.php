<?php
include "server.php";

if(isset($_POST['save']))
{
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];

    try {
        // Establish database connection
        $bddpdo = new PDO("mysql:host=$server;dbname=appweb",$user,$pass);
        $bddpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement
        $sql="INSERT INTO register (email, username, password, password1) VALUES (?, ?, ?, ?)";
        $bdd=$bddpdo->prepare($sql);

        // Bind parameters
        $bdd->bindParam(1, $email);
        $bdd->bindParam(2, $username);
        $bdd->bindParam(3, $password);
        $bdd->bindParam(4, $password1);

        // Execute the query
        if ($bdd->execute()) {
            echo "User registered successfully!";
        } else {
            echo "Registration failed!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
