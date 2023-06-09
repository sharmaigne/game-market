<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E&S Games: Welcome!</title>

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php?index=true">E&S</a>

            <div class="navbar-nav">
                <a class="nav-link" aria-currrent="page" href="user.php?user=true">Store</a>
                <a class="nav-link active" href="library.php?library=true">Library</a>
            </div>

            <form action="gallery.php" method = "GET" class="d-flex"> 
                <input list="gameSuggestions" class="form-control me-2" placeholder="Search games in library..." aria-label="Search" id="Search" name="library-search" type="text">
                <datalist id="gameSuggestions" class="search-datalist">
                    <?php include_once 'autocomplete.php';?>
                </datalist>
                <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
            </form>
            
            <!-- View as User button -->
            <a class="btn btn-light" href="index.php?index=true" role="button">View as Admin</a>
        </div>
    </nav>

    <!-- heading -->
    <div class="p-10 text-center mt-5 mb-5">
        <h1 class="mb-3 text-white">Welcome to Library!</h1>
        <h4 class="mb-3 text-white">Can't find what you're looking for? Head on to the <a href="user.php?user=true" style="color:green;">Store.<a></h4>
    </div>
    <!-- Gallery handles owned -->
    <?php include_once 'gallery.php' ?>
    <!-- JQUERY, POPPER, BOOTSTRAP SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
