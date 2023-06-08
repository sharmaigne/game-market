<?php   
    // Create database connection WIP (should i connect by user credentials?)
    $conn = mysqli_connect("localhost", "root", "", "es_game_market"); 

    // connection errors
    if (mysqli_connect_errno()) {
        die('Database connnection failed: ' . mysqli_connect_error());
        echo '<h1>HIII</h1>';
    }

    // encoding
    mysqli_set_charset($conn, 'utf8');

    // include functions file
    require_once 'functions.php'; // include vs require: latter throws error and exits, former warns
?>