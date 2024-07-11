<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ishan"; // Change to your database name
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form_id"] == "RegForm") {
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];

        $sql = "INSERT INTO user (Username, Password) VALUES ('$Username', '$Password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form_id"] == "loginForm") {
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];

        $sql = "SELECT * FROM user WHERE Username ='$Username' AND Password='$Password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid username or password";
        }
    }

    $conn->close();
?>
