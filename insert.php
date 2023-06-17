<!-- INSERT PHP HERE: require config, functions -->

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

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/general.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <!-- Navigation Bar -->
    <?php include 'navbar.php'?>
    <!-- random ID gets generated when page is loaded -->
    <?php $randomId = rand(0,99999);?>

    <div class="p-10 text-center mt-5">
        <h1 class="mb-3 text-white">Add info for game <span style="color: green;"><?='#' . $randomId?></span></h1>
    </div>
    <form action="insert.php" method="POST" class="container">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="game_name">Game Name</label>
                <input type="text" class="form-control" id="game_name" name="game_name" placeholder="">
            </div>
            <div class="form-group col-sm-6">
                <label for="developer">Developer</label>
                <input type="text" class="form-control" id="developer" name="developer" placeholder="Enter developer">
            </div>
        </div>

      <div class="row mt-3">
            <div class="form-group col-sm-3">
                <label for="release_date">Release Date</label>
                <input type="text" class="form-control" id="release_date" name="release_date" placeholder="Enter release date (yyyy-mm-dd)">
            </div>
            <div class="form-group col-sm-3">
            <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
            </div>
            <div class="form-group col-sm-3">
                <label for="storage">Storage</label>
                <input type="text" class="form-control" id="storage_required" name="storage_required" placeholder="Enter storage">
            </div>
            <div class="form-group col-sm-3">
                <label for="stars">Stars</label>
                <input type="number" class="form-control" id="stars" name="stars" min="0" max="5" placeholder="Enter stars">
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="image">Image Link</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Enter image link">
        </div>
        <div class="form-group mt-3">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter comma separated tags">
        </div>
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <div class="form-control" id="description" name="description" contenteditable="true" placeholder="Enter description"></div>
        </div>
        <div class="form-group d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary mt-5 align-self-right">Submit</button>
        </div>
    </form>

    <!-- JQUERY, POPPER, BOOTSTRAP SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>