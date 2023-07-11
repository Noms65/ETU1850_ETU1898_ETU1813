<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="form login">
    <h1> </h1>
    <b><?php if(isset($response)) echo $response; ?></b>
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('controller_events/insert_Events'); ?>">
      <p style="color:red"><?php echo isset($error) ? $error : ''; ?></p>
      <p><input type="datetime-local" name="date_events"  placeholder="date events" required /></p>
      <p><input type="text" name="titre" placeholder="titre" required /></p>
      <p><input type="text" name="contenu" placeholder="Contenu" required /></p>
      <p><input type="file" name="file" placeholder="Upload Photo" required /></p>
      <p><input type="submit" name='upload' value="valider"/></p>
      <p><a href="<?php echo site_url('controller_events/getList_events'); ?>">List Events</a></p>
      <a href="<?php echo site_url('login/acceuil'); ?>">Acceuil</a>
    </form>
  </div>      
</body>
</html>