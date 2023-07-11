
      




  <!-- Manoratra ao @droite -->
  <h1>Proposition</h1>


  <table id="customers">
  <tr>
    <th>numero</th>
    <th>Jour</th>
    <th>Activité</th>
    <th>Durré</th>
    <th>Type</th>
    <th>Régime</th>
    <th>quantite</th>
    <th>prix</th>
  </tr>
  <?php 
        
        for ($id=0;$id<count($proposition);$id++){ 
          ?>
    <tr><td><?php echo $proposition[$id]['num']; ?></td>
    <td><?php echo $proposition[$id]['jour']; ?></td>
    <td><?php echo $proposition[$id]['nomactivites']; ?></td>
    <td><?php echo $proposition[$id]['duree']; ?> minute</td>
    <td><?php echo $proposition[$id]['kaly_type']; ?></td>
    <td><?php echo $proposition[$id]['kalynom']; ?></td>
    <td><?php echo $proposition[$id]['quantite']; ?> g</td>
    <td><?php echo $proposition[$id]['prix']; ?> ar</td>
    </tr>
    <?php } ?>
 
</table>