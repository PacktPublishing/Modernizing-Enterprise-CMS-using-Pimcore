
<div class)="row">
<?php
foreach($this->items as $entry) {
    ?>
   
   
    <div class="row mt-2 card  "  >
  <div class="card-body" >
  <div class="row" >

  <div class="col-2 " >
      <img src="<?=$entry->getImage()->getThumbnail("small-square")?>"  />
  </div>
      
 <div class="col-10" >
 <a href="<?=
    $this->path('blogpage', [
    'slug' => $entry->get("Slug")
]);
?>"><h5 class="card-title"><?=$entry->get("Title")?></h5></a>
    <h6 class="card-subtitle mb-2 text-muted"><?=$entry->get("Subtitle")?></h6>
    <p class="card-text"> <?=$entry->get("Abstract")?></p>


    
    </div>

  </div>
</div>
</div>

 <?php }      ?>

   
 </div>