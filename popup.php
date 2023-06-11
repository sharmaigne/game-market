<!-- uses variables + function declared in gallery.php -->
<div class="modal border" id="modal_<?=$gameId;?>" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-white bg-dark border-secondary border-2">
<!-- uses variables declared in gallery.php -->
<div class="modal border" id="modal_<?=$gameId;?>" >
    <div class="modal-dialog">
        <div class="modal-content text-black">
            <div class="modal-header">
                <h2 class="modal-title p-2">
                    <?=$gameName . " ";?>
                </h2>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body d-flex flex-column">
                <div class="p-2 d-flex flex-row justify-content-around">
                    <code> GameID: <?=$gameId;?> </code>

                    <div class="stars d-flex p-2 pt-0">
                        <p><?= $stars;?>&nbsp</p>
                        <span class="star-icon filled"></span> 
                    </div>

                    <p><?= ($price == '0.00') ? "FREE" : "₱" . $price;?></p>

                    <p class="p-2 pt-0">Developed by: <?= $dev; ?></p>
            <div class="modal-body d-flex flex-column">
                <div class="p-2 d-flex flex-row">
                    <code> <?=$gameId;?> </code>
                    <p><?= $price;?></p>
                </div>
                <img src="<?= $image; ?>" alt="image for <?=$gameName;?>" class="thumbnail" style="object-fit:contain;">
                <div class="p-2 d-flex flex-column">
                    <button type="button" class="btn btn-lg <?= ($owned) ? "btn-outline-success" : "btn-success";?>"
                    <?= ($owned) ? "disabled" : "" ;?>> <?= ($owned) ? "In Library" : "Purchase";?> </button>

                    <br>
                    <p style="text-align: justify;">&nbsp&nbsp&nbsp&nbsp<?= $description;?></p>

                    <p style = "text-align: left;"><strong>Released on: </strong><?= $releaseDate; ?></p>
                    <p style = "text-align: left;"><strong>Tags: </strong> <?= $tags; ?></p>
                    <p style = "text-align: left;"><strong>Storage Requirement: </strong><?= $storage;?></p>
                <img src="<?= $image; ?>" alt="image for <?=$gameName;?>" class="thumbnail" style="object-fit:contain;">
                <div class="p-2">
                    <p><?= $description;?></p>
                </div>
            </div>
        </div>
    </div>
</div>
