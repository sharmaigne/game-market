
<div class="modal" id="modal_<?=$gameId;?>" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data_dismiss="modal">X</button>
                <h2 class="modal-title p-2">
                    <?=$gameName."<code>".$gameId."</code>";?>
                </h2>
            </div>
            <div class="modal-body g-2">
                <!-- placeholder -->
                <div class="col-6">
                    <img src="<?= $image; ?>" alt="image for <?=$gameName;?>" class="thumbnail">
                </div>
                <div class="col-6 p-2">
                    <p><?= $description;?></p>
                </div>
            </div>
        </div>
    </div>
</div>
