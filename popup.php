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
                <div class="p-2 d-flex flex-row">
                    <code> <?=$gameId;?> </code>
                    <p><?= $price;?></p>
                </div>
                <img src="<?= $image; ?>" alt="image for <?=$gameName;?>" class="thumbnail" style="object-fit:contain;">
                <div class="p-2">
                    <p><?= $description;?></p>
                </div>
            </div>
        </div>
    </div>
</div>
