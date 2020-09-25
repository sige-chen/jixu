<?php 
/* @var \app\models\MdlUsers[] $users */
?>
<div class="row" style="padding: 0;">
  <?php foreach ( $users as $user ): ?>
  <div class="col-md-2">
    <img src="<?php echo $user->photo_url;?>" class="img-thumbnail">
  </div>
  <?php endforeach;?>
</div>