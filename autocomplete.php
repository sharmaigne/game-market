<!-- added in searches to generate datalist for 'autocomplete' feature -->
<?php require_once 'config.php'?>

<?php
    $query = "SELECT game_name, game_id FROM `market` ORDER BY game_name ASC";
    if ( isset($_GET['library']) || isset($_GET['library-search'])) {
        $query = "SELECT game_name FROM `market` WHERE owned=1 ORDER BY game_name ASC";
    }
    $result = mysqli_query($conn, $query);

    // generate datalist options
    if (isset($_GET['index']) || isset($_GET['search']) || isset($_GET['user']) || isset($_GET['user-search']) || isset($_GET['library']) || isset($_GET['library-search'])) {
        while ($row = mysqli_fetch_assoc($result))
            echo '<option value="' . $row['game_name'] . '"></option>';
    } else { // has gameId, for admin options
        while ($row = mysqli_fetch_assoc($result))
            echo '<option value="' . $row['game_name'] . ' #' . $row['game_id'] .'"></option>';
    }

?>
