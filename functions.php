<?php
    /* sanitize every user input to prevent SQL injection */
    function sanitize($conn, $data) {
        return mysqli_real_escape_string($conn, $data);
    }

    /* Insert a game based on the input data */
    function insertGame($conn, $gameData) {
        $gameId       = sanitize($conn, $gameData['game_id']);
        $gameName     = sanitize($conn, $gameData['game_name']);
        $image        = sanitize($conn, $gameData['image']);
        $tags         = sanitize($conn, $gameData['tags']);
        $dev          = sanitize($conn, $gameData['developer']);
        $price        = sanitize($conn, $gameData['price']);
        $storage      = sanitize($conn, $gameData['storage_required']);
        $releaseDate  = sanitize($conn, $gameData['release_date']);
        $description  = sanitize($conn, $gameData['description']);
        $owned        = sanitize($conn, $gameData['owned']);
        $stars        = sanitize($conn, $gameData['stars']);

        $insertQuery = "INSERT INTO `market` (
            `game_id`, `game_name`, `image`, `tags`, `developer`, `price`,
            `storage_required`, `release_date`, `description`, `owned`, `stars`) 
            VALUES (
                '$gameId', '$gameName', '$image', '$tags', '$dev', '$price',
                '$storage', '$releaseDate', '$description', '$owned', '$stars')";
        
        $result = mysqli_query($conn, $insertQuery);

        if (!$result)
           die('Could not insert into database: ' . mysqli_error($conn));

        return mysqli_insert_id($conn); // int. value of AUTO_INCREMENT field. 
    }

    /* Update a pre-existing game in the database */
    function updateGame($conn, $gameId, $gameData) {
        $gameName     = sanitize($conn, $gameData['game_name']);
        $image        = sanitize($conn, $gameData['image']);
        $tags         = sanitize($conn, $gameData['tags']);
        $dev          = sanitize($conn, $gameData['developer']);
        $price        = sanitize($conn, $gameData['price']);
        $storage      = sanitize($conn, $gameData['storage_required']);
        $releaseDate  = sanitize($conn, $gameData['release_date']);
        $description  = sanitize($conn, $gameData['description']);
        $owned        = sanitize($conn, $gameData['owned']);
        $stars        = sanitize($conn, $gameData['stars']);

        // UPDATE query
        $updateQuery = 
            "UPDATE `market` SET 
                    `game_name` = '$gameName', `image` = '$image', `tags` = '$tags', 
                    `developer` = '$dev', `price` = '$price', `storage_required` = '$storage',
                    `release_date` = '$releaseDate', `description` = '$description', `owned` = '$owned',
                    `stars` = '$stars'
                WHERE game_id = '$gameId'";
            
        $result = mysqli_query($conn, $updateQuery);

        if (!$result)
            die ('Could not update game of id ' . $gameId . ': ' . mysqli_error($conn))

        return mysqli_affected_rows($conn);
    }

    /* Delete a pre-existing game in the database */
    function deleteGame($conn, $gameId) {

        $deleteQuery = "DELETE FROM `market` WHERE `game_id` = $gameId";     
        $result = mysqli_query($conn, $deleteQuery);

        if (!$result) 
           die('Could not insert into database: ' . mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }
     
    /* When called, update owned */
    function buyGame($conn, $gameId) {
        $buyQuery = "UPDATE `market` SET owned = 1 WHERE game_id = '$gameId'";
        $result = mysqli_query($conn, $buyQuery);

        if (!$result) 
           die('Could not insert into database: ' . mysqli_error($conn));
    }
?>