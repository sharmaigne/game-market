<!-- INSERT PHP HERE: require config, functions -->
<?php require_once 'config.php'?>
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

    <form action="update.php" method="GET" class="row mb-5">
        <div class="col">
            <input list="gameSuggestions" class="form-control" placeholder="Choose a game to edit..." aria-label="Search" id="searchForUpdate" name="searchForUpdate" type="text">
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

    <form action="update.php" method="POST" class="container">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="game_name">Game Name</label>
                <input type="text" class="form-control" id="game_name" name="game_name" placeholder="" value="<?= (isset($game) ? $game['game_name'] : '')?>">
            </div>
            <div class="form-group col-sm-6">
                <label for="developer">Developer</label>
                <input type="text" class="form-control" id="developer" name="developer" placeholder="Enter developer" value="<?= (isset($game) ? $game['developer'] : '')?>">
            </div>
        </div>

      <div class="row mt-3">
            <div class="form-group col-sm-3">
                <label for="release_date">Release Date</label>
                <input type="text" class="form-control" id="release_date" name="release_date" placeholder="Enter release date (yyyy-mm-dd)" value="<?= (isset($game) ? $game['release_date'] : '')?>">
            </div>
            <div class="form-group col-sm-3">
            <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="<?= (isset($game) ? $game['price'] : '')?>">
            </div>
            <div class="form-group col-sm-3">
                <label for="storage">Storage</label>
                <input type="text" class="form-control" id="storage_required" name="storage_required" placeholder="Enter storage" value="<?= (isset($game) ? $game['storage_required'] : '')?>">
            </div>
            <div class="form-group col-sm-3">
                <label for="stars">Stars</label>
                <input type="number" class="form-control" id="stars" name="stars" min="0" max="5" placeholder="Enter stars" value="<?= (isset($game) ? $game['stars'] : '')?>">
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="image">Image Link</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Enter image link" value="<?= (isset($game) ? $game['image'] : '')?>">
        </div>
        <div class="form-group mt-3">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter comma separated tags" value="<?= (isset($game) ? $game['tags'] : '')?>">
        </div>
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <div class="form-control" id="description" name="description" contenteditable="true" placeholder="Enter description"><?= (isset($game) ? $game['description'] : '')?></div>
        </div>
        <div class="form-group d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary mt-5 align-self-right">Update</button>
        </div>
    </form>
    </div>

    <!-- JQUERY, POPPER, BOOTSTRAP SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

    <!-- AUTOCOMPLETE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

</body>
</html>