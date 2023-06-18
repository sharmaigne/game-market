<?php 
    require_once 'config.php';
    require_once 'functions.php';
?>
<?php 
    if(isset($_GET['searchForDelete'])) {
        $search = $_GET['searchForDelete'];
        // from last '#' to end to get game id
        $gameId = substr($search, strpos($search, '#') +1);
        
        $query = "SELECT game_name FROM `market` WHERE game_id = '$gameId'";
        $result = mysqli_query($conn, $query);
        $game = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) { // always 0 or 1 since gameId is a primary key
            deleteGame($conn, $gameId);
            echo '<div id="success-message" class="alert alert-success" role="alert" style="position:fixed; bottom:0; left:0; right:0; z-index:9999; opacity:1; transition: opacity 0.5s ease;">'. $game['game_name']. ' (#' . $gameId . ') successfully deleted from the market.</div>';
            echo '<script>setTimeout(function(){ document.getElementById("success-message").style.opacity = "0"; }, 3500);</script>';
        } else 
            echo '<div class="alert alert-danger" role="alert">Game not found.</div>';
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E&S Games: Delete a Game</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous">  
    <!-- BOOSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/general.css">
</head>
<body>
    <!-- Navigation Bar -->
    <?php include 'navbar.php'?>

    <div class="container">
    <div class="p-3 text-center mt-5">
        <h1 class="mb-3 text-white">Delete a game</h1>
    </div>

    <form action="delete.php" method="GET" class="row mb-5">
        <div class="col">
            <input list="gameSuggestions" class="form-control" placeholder="Choose a game to delete..." aria-label="Search" id="searchForDelete" name="searchForDelete" type="text">
            <datalist id="gameSuggestions" class="search-datalist">
                <?php include_once 'autocomplete.php';?>
            </datalist>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-light" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>

    <!-- JQUERY, POPPER, BOOTSTRAP SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- AUTOCOMPLETE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
</body>
</html>
