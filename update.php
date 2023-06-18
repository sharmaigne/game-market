<?php 
    require_once 'config.php';
    require_once 'functions.php';
?>
<?php 
    if(isset($_GET['searchForUpdate'])) {
        $search = $_GET['searchForUpdate'];
        // from last '#' to end to get game id
        $gameId = substr($search, strpos($search, '#') +1);
        
        $query = "SELECT * FROM `market` WHERE game_id = '$gameId'";
        $result = mysqli_query($conn, $query);
        $game = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) { // always 0 or 1 since gameId is a primary key

        } else 
            echo '<div class="alert alert-danger" role="alert">Game not found.</div>';
    } 

    if(isset($_POST['submit'])) {
        updateGame($conn, $_POST['game_id'], $_POST);
        echo '<div id="success-message" class="alert alert-success" role="alert" style="position:fixed; bottom:0; left:0; right:0; z-index:9999; opacity:1; transition: opacity 0.5s ease;">Details of '. $_POST['game_name']. ' (#' . $_POST['game_id'] . ') successfully updated.</div>';
        echo '<script>setTimeout(function(){ document.getElementById("success-message").style.opacity = "0"; }, 3500);</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E&S Games: Insert a Game</title>

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
        <h1 class="mb-3 text-white">Update an existing game</h1>
    </div>

    <form action="update.php" method="GET" class="container row mb-5">
        <div class="col-11">
            <input list="gameSuggestions" class="form-control" placeholder="Choose a game to edit..." aria-label="Search" id="searchForUpdate" name="searchForUpdate" type="text">
            <datalist id="gameSuggestions" class="search-datalist">
                <?php include_once 'autocomplete.php';?>
            </datalist>
        </div>
        <div class="col d-flex justify-content-center">
            <button class="btn btn-outline-light" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>

    <form action="update.php" method="POST" class="container">
        <input type="hidden" value="<?=$gameId;?>" name="game_id">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="game_name">Game Name</label>
                <input type="text" class="form-control" id="game_name" name="game_name" pattern="[\s\S]+" placeholder="" value="<?= (isset($game) ? $game['game_name'] : '')?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="developer">Developer</label>
                <input type="text" class="form-control" id="developer" name="developer" pattern="[\s\S]+" placeholder="Enter developer" value="<?= (isset($game) ? $game['developer'] : '')?>" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-sm-3">
                <label for="release_date">Release Date</label>
                <input type="text" class="form-control" id="release_date" name="release_date" placeholder="Enter release date (yyyy-mm-dd)" value="<?= (isset($game) ? $game['release_date'] : '')?>" required>
                <div class="invalid-feedback">
                    Enter a valid date.
                </div>
            </div>
            <div class="form-group col-sm-3">
            <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" pattern="^\d+(\.[\d]{1,2})?$" placeholder="Enter price" value="<?= (isset($game) ? $game['price'] : '')?>" required>
                <div class="invalid-feedback">
                    Enter a valid price.
                </div>
            </div>
            <div class="form-group col-sm-3">
                <label for="storage">Storage</label>
                <input type="text" class="form-control" id="storage_required" name="storage_required" pattern="^[0-9]+(\.[0-9]+)?\s[G,M,K]B$" placeholder="Enter storage" value="<?= (isset($game) ? $game['storage_required'] : '')?>" required>
                <div class="invalid-feedback">
                    Enter a valid storage requirement.
                </div>
            </div>
            <div class="form-group col-sm-3">
                <label for="stars">Stars</label>
                <input type="text" class="form-control " id="stars" name="stars" pattern="^(5(\.0)?)|([0-4](\.[0-9]{0,2})?)$" min="0" max="5" step="0.1" placeholder="Enter stars" value="<?= (isset($game) ? $game['stars'] : '')?>" required>
                <div class="invalid-feedback">
                    Enter a valid star rating out of 5.
                </div>
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="image">Image Link</label>
            <input type="url" class="form-control" id="image" name="image" placeholder="Enter image link" value="<?= (isset($game) ? $game['image'] : '')?>" required>
            <div class="invalid-feedback">
                Enter a valid image link.
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" pattern="[\s\S]+" placeholder="Enter comma separated tags" value="<?= (isset($game) ? $game['tags'] : '')?>" required>
        </div>
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <!-- <input type="text" class="form-control" id="description1" name="description1" placeholder="Enter description" value="<?= (isset($game) ? $game['description'] : '')?>"> -->
            <textarea name="description" id="description" class="form-control" placeholder="Enter description" row=10><?= (isset($game) ? $game['description'] : '')?></textarea>
        </div>
        <div class="form-group d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary mt-5 align-self-right" name="submit">Update</button>
        </div>
    </form>
    </div>

    <!-- JQUERY, POPPER, BOOTSTRAP SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- AUTOCOMPLETE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

</body>
</html>
