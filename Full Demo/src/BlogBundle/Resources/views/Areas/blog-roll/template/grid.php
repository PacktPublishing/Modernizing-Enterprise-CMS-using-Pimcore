
<div class="row" >
<?php
foreach($this->items as $entry) {
    ?>
   

    <div class="card  col-2 ml-1" >
  <div class="card-body">
    <a href="<?=
    $this->path('blogpage', [
    'slug' => $entry->get("Slug")
]);
?>"><h5 class="card-title"><?=$entry->get("Title")?></h5></a>
    <h6 class="card-subtitle mb-2 text-muted"><?=$entry->get("Subtitle")?></h6>
    <p><img src="<?=$entry->getImage()->getThumbnail("small-grid")?>" width="100%"/></P>
    <p class="card-text"> <?=$entry->get("Abstract")?></p>

    


  </div>
</div>

 <?php }      ?>

    </div>
