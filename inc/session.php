<?php

// user authorization
if (empty($_SESSION['userID']) && empty($_SESSION['role'])) {
    session_destroy();
    header("location: ../../login");
}

?>