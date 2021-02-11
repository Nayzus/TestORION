<div class="item">
    <div class="card" data-id='<?php echo $camera->id?>' key='<?php echo $i?>' data-active='0'>
        <div class="card__img" style='background-image: url("https://krkvideo14.orionnet.online/cam<?php echo $camera->id?>/preview.jpg")'>
            <span class="card__city"><?php echo $camera->city?></span>
        </div>

        <h2><?php echo $camera->title?></h2>
    </div>
</div>