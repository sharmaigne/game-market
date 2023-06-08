<?php
    require_once 'config.php';
?>

<div class="gallery">
    <?php
        $searchQuery = $_GET['search']; /* from navbar search */
        $query = "SELECT game_name, image, stars, price FROM market";
        $result = empty($searchQuery) ? mysqli($conn, $query) : mysqli($conn, $query . " WHERE game_name LIKE '%$searchQuery%'");

        while ($row = mysqli_fetch_assoc($result)) { // start of while loop, every row
            $gameName = $row['game_name'];
            $image = $row['image'];
            $stars = $row['stars'];
            $price = $row['price'];
    ?>

    <div class="gallery-item">
        <img src="<?= $image; ?>" alt="image for <?=$gameName;?>" class="thumbnail">
        <div class="caption">
            <h5><?= $gameName; ?></h5>
        <div class="stars">
            <?php
                $starCount = intval($stars); // Get the integer part of the star rating
                $decimalPart = $stars - $starCount; // Get the decimal part

                // Generate the shaded stars based on the integer part
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $starCount) {
                        echo '<span class="star-icon filled"></span>'; // Shaded star icon
                    }
                }

                // Generate the partially shaded star based on the decimal part
                if ($decimalPart > 0) {
                    $width = intval($decimalPart * 100); // Convert the decimal to percentage width
                    echo '<span class="star-icon partial" style="width: ' . $width . '%;"></span>'; // Partially shaded star
                }
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
        }

        mysqli_free_result($result);
    ?>
</div>

