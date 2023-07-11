

<div class="card">
  <img src="<?php echo base_url('./assets/images/client.png'); ?>" alt="John" style="width:100%">
  <h1>Votre Profile</h1>
  <?php 
        
  for ($id=0;$id<count($data_User);$id++){ 
    ?>
  <h3><?php echo $data_User[$id]['nom']; ?></h3>
  <h3><?php echo $data_User[$id]['prenom']; ?></h3>
  <h3><?php echo $data_User[$id]['telephone']; ?></h3>
  <h3><?php echo $data_User[$id]['genre']; ?></h3>
  <h3><?php echo $data_User[$id]['email']; ?></h3>
  <h3><?php echo $data_User[$id]['addresse']; ?></h3>
  
  <a href="#"><i class="fa fa-dribbble"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
  <a href="#"><i class="fa fa-facebook"></i></a>
  <p><button>Edit</button></p>
  <?php } ?>
</div> 