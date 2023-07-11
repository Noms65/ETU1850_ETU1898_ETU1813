
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> </title>
    <link rel="stylesheet" href="styleMenu.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<!-- ..... -->

<body>
  <!-- Manoratra ao @droite -->
  <h1>Proposition</h1>
  <?php 
        
  for ($id=0;$id<count($proposition);$id++){ 
    ?>
    <h2><?php echo $proposition[$id]['num']; ?></h2>
    <h2><?php echo $proposition[$id]['jour']; ?></h2>
    <h2><?php echo $proposition[$id]['nomactivites']; ?></h2>
    <p><?php echo $proposition[$id]['duree']; ?></p>
    <p><?php echo $proposition[$id]['kalytype']; ?></p>
    <p><?php echo $proposition[$id]['kalynom']; ?></p>
    <p><?php echo $proposition[$id]['quantite']; ?></p>
  <?php } ?>

  <a href="<?php echo site_url('controller_events/getObjectif'); ?>">Objectif</a>
  <p><a href="<?php echo site_url('controller_events/index'); ?>">Acceuil</a></p>

</body>
</html>