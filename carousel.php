<?php
    require_once 'config.php';
?>

<div id="carousel" class="carousel slide" data-bs-ride="carousel" >
    <div class="carousel-indicators">
        <?php
            $query = "SELECT game_id FROM market ORDER BY stars DESC LIMIT 5";
            $result = mysqli_query($conn, $query);
            $active = true;
            $indicatorIndex = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                $gameId = $row['game_id'];
                $activeClass = $active ? 'active' : '';
        ?>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="<?= $indicatorIndex; ?>" class="<?= $activeClass; ?>"></li>
        <?php
                $active = false;
                $indicatorIndex++;
            }
            mysqli_free_result($result);
        ?>
    </div>

    <div class="carousel-inner">
        <?php
            $query = "SELECT `game_id`, `game_name`, `image` FROM market ORDER BY stars DESC LIMIT 5";
            $result = mysqli_query($conn, $query);
            $active = true;

            while ($row = mysqli_fetch_assoc($result)) {
                $gameId = $row['game_id'];
                $gameName = $row['game_name'];
                $image = $row['image'];
                $activeClass = $active ? 'active' : '';
        ?>
        <div class="carousel-item <?= $activeClass; ?>" data-bs-interval="3000">
            <img src="<?= $image; ?>" class="d-block w-100" alt="<?= $gameName; ?>">
            <div class="carousel-caption">
                <h5><?= $gameName; ?></h5>
            </div>
        </div>
        <?php
                $active = false;
            }
            mysqli_free_result($result);
        ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>