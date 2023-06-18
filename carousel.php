<?php
    require_once 'config.php';

    $query = "SELECT `game_name`, `image` FROM `market` ORDER BY stars DESC LIMIT 5";
    $result = mysqli_query($conn,$query);

?>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
        <?php 
            $row = mysqli_fetch_assoc($result);
            echo "<div class='carousel-item active'>";
            echo "<img src='$row[image]' class='thumbnail d-block w-100' style='object-fit:contain'>";
            echo "<div class='carousel-caption'><h2 class='text-white' style='-webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: gray;'>$row[game_name]</h2></div></div>";

            while ($row = mysqli_fetch_assoc($result)) {
                $gameName   = $row['game_name'];
                $image      = $row['image'];

                echo "<div class='carousel-item'>";
                echo "<img src='$row[image]' class='d-block w-100'>";
                echo "<div class='carousel-caption'><h2 class='text-white' style='-webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: gray;'>$row[game_name]</h2></div></div>";
            }
        ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
