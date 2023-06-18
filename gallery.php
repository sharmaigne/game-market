<?php 
    require_once 'config.php'; 
    require_once 'functions.php';

    if (isset($_GET['user']) || isset($_GET['user-search'])){
        include_once 'user.php';
    } else if (isset($_GET['library']) || isset($_GET['library-search'])){
        include_once 'library.php';
    } else {
        include_once 'index.php';
    }
?>

<div class="gallery">
    <?php 
        // include 'filters.php';
        $query = "SELECT * FROM market";
        if (isset($_GET['library']))
            $query .= " WHERE owned = 1";

        // initialize searchQuery from index.php or user.php
        if (isset($_GET['search']))
            $searchQuery = trim($_GET['search']);
        else if (isset($_GET['user-search']))
            $searchQuery = trim($_GET['user-search']);
        else if (isset($_GET['library-search']))
            $searchQuery = trim($_GET['library-search']);
        else
            $searchQuery = "";

        if (!empty($searchQuery))
            $query .= " WHERE game_name LIKE '%$searchQuery%'";
        if (isset($_GET['library-search']))
            $query .= " AND owned = 1";

        $query .= " ORDER BY stars DESC"; // ordered by descending popularity

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) { // start of while loop, every row
            $gameId         = $row['game_id'];
            $gameName       = $row['game_name'];
            $image          = $row['image'];
            $tags           = $row['tags'];
            $dev            = $row['developer'];
            $price          = number_format($row['price'], 2);
            $storage        = $row['storage_required'];
            $releaseDate    = $row['release_date'];
            $description    = $row['description'];
            $owned          = $row['owned'];
            $stars          = $row['stars'];
    ?>

    <div class="gallery-item">
        <?php include 'popup.php'; ?>
            <img data-bs-toggle="modal" style="cursor:pointer" data-bs-target="#modal_<?=$gameId;?>" src="<?= $image; ?>" alt="image for <?=$gameName;?>" class="thumbnail">
        <div class="caption">
            <h5><?= $gameName;?></h5>
        <div class="stars">
            <?php
                $starCount = intval($stars);
                $decimalPart = $stars - $starCount; 
                $width = intval($decimalPart * 100);

                // Generate the shaded stars based on the integer part
                for ($i = 0; $i < $starCount; $i++)
                    echo '<span class="star-icon filled"></span>';      // Shaded star icon

                // Generate the partially shaded star based on the decimal part
                if ($decimalPart > 0) 
                    echo '<span class="star-icon partial" style="width: ' . $width . '%;"></span>'; 
                echo $stars;
            ?>
        </div>
            <?php
                if ($price == 0) echo '<p>Price: Free </p>';
                else echo '<p>Price: ₱' . $price . '</p>';
            ?>
        </div>
    </div>
    <?php
        } // end of while loop

        mysqli_free_result($result);
    ?>
</div>
