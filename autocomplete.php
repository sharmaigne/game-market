<!-- added in searches to generate datalist for 'autocomplete' feature -->
<?php require_once 'config.php'?>

<?php
    $query = "SELECT game_name, game_id FROM `market`";
    $result = mysqli_query($conn, $query);

    // generate datalist options
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['game_name'] . ' #' . $row['game_id'] .'"></option>';
    }

?>