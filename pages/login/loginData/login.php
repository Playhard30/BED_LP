<?php
include("../../../inc/connection.php");

if (isset($_POST['signin']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION['errorMessage'] = array();
    $enteredUsername = htmlentities($_POST['username']);
    $enteredPassword = htmlentities($_POST['password']);

    //Query
    $query = "CALL sp_getUserLogin(?)";
    $params = array(
        array('type' => 's', 'value' => $_POST['username']),
    );
    $settings = $conn->execQuery($query, $params);

    // Verify user
    if (!empty($settings)) {
        $hashedPassword = $settings[0]['password'];
        $checkedPassword = password_verify($enteredPassword, $hashedPassword);

        // check password
        if ($checkedPassword) {
            $_SESSION['userID'] = $settings[0]['id'];
            $_SESSION['role'] = $settings[0]['role'];
            $_SESSION['username'] = $settings[0]['username'];
            $_SESSION['email'] = $settings[0]['email'];

            header("location: ../../dashboard/");
            exit();
        } else {
            $_SESSION['errorMessage']['password'] = ["is-invalid", "The password you’ve entered is incorrect."];
            $_SESSION['errorMessage']['formData'] = [$enteredUsername, $enteredPassword];
        }

    } else {
        $_SESSION['errorMessage']['username'] = ["is-invalid", "The username or password you’ve entered is incorrect."];
        $_SESSION['errorMessage']['formData'] = [$enteredUsername, $enteredPassword];
    }

    header("location: ../../../login");
    exit();
} else {
    header("location: ../../../login");
    exit();
}



?>