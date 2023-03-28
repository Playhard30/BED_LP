<?php
include("connection.php");

// $query = $_GET['query'];
$result = $conn->execQuery("CALL sp_getAllPrincipal");
echo json_encode($result);

?>