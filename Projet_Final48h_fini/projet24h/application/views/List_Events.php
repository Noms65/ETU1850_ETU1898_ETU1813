
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

  <h1>Profil Utilisateur</h1>
    <form method="post" action="<?php echo site_url('controller_events/insert_users_profil'); ?>">
      <p style="color:red"><?php echo isset($errorl) ? $errorl : ''; ?></p>
      <p><input type="number" name="age" placeholder="age" required /></p>
      <p><input type="number" name="poids" placeholder="poids" required /></p>
      <p><input type="number" name="taille" placeholder="taille" required /></p>
      <select name="condition">
        <option value="1">augmenter</option>
        <option value="-1">diminuer</option>
      </select>
      <p><input type="submit" value="Login"/></p>
    </form>
  <br>
  <a href="<?php echo site_url('login'); ?>">Deconnexion</a>
</body>
</html>