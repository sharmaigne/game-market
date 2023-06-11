<?php 
    require_once 'config.php'; 
    include_once 'index.php';
?>

<div class="gallery">
    <?php 
        // include 'filters.php';

        $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
        $query = "SELECT * FROM market";
        if (!empty($searchQuery)) {
            $query .= " WHERE game_name LIKE '%$searchQuery%'";
        }
        $query .= " ORDER BY stars DESC"; // ordered by descending popularity
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_assoc($result)) { // start of while loop, every row
            $gameId = $row['game_id'];
            $gameName = $row['game_name'];
            $image = $row['image'];
            $tags = $row['tags'];
            $dev = $row['developer'];
            $price = $row['price'];
            $storage = $row['storage_required'];
            $releaseDate = $row['release_date'];
            $description = $row['description'];
            $owned = $row['owned'];
            $stars = $row['stars'];
            $gameName = $row['game_name'];
            $image = $row['image'];
            $stars = $row['stars'];
            $price = number_format($row['price'], 2);
    ?>

    <div class="gallery-item">
        <?php include 'popup.php'; ?>
        <img src="<?= $image; ?>" alt="image for <?=$gameName;?>" class="thumbnail"
         data-toggle="modal" data-target="#modal_<?=$gameId;?>">
        <div class="caption">
            <h5><?= $gameName; ?></h5>
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
                else echo '<p>Price: ₱' . $price . '.00</p>';
            ?>
        </div>
    </div>
    <?php
        } // end of while loop

        mysqli_free_result($result);
    ?>
</div>

