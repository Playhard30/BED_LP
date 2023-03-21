<?php
include("../../../inc/connection.php");

if (isset($_POST['signin']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $query = "CALL sp_getUserLogin(?)";
    $params = array(
        array('type' => 's', 'value' => $_POST['username']),
    );
    $settings = $conn->execQuery($query, $params);

    print_r($settings);
}



?>