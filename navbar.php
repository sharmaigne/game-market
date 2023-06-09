<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php?index=true">E&S</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a href="#" role="button" class="nav-link dropdown-toggle" id="updateDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin Options</a>
                <div class="dropdown-menu" aria-labelledby="updateDropdown">
                    <a href="insert.php" class="dropdown-item">Add a new game</a>
                    <a href="update.php" class="dropdown-item">Update a game</a>
                    <a href="delete.php" class="dropdown-item">Delete a game</a>
                </div>
            </li>
        </ul>
        <!-- Search bar -->
        <form action="gallery.php" method="GET" class="d-flex">
            <input list="gameSuggestions" class="form-control me-2" placeholder="Search games..." aria-label="Search" id="Search" name="search" type="text">
            <datalist id="gameSuggestions" class="search-datalist">
                <?php include_once 'autocomplete.php';?>
            </datalist>
            <button class="btn btn-outline-light" type="submit"> <i class="bi bi-search"></i> </button>
        </form>
        
        <!-- View as User button -->
        <a class="btn btn-light" href="user.php?user=true" role="button">View as User</a>
    </div>
</nav>
