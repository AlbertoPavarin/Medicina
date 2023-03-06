<?php

include_once dirname(__FILE__) . '/../functions/getArchiveActivities.php';

$activities = array();
$response = getArchiveActivities();

while($record = $response->fetch_assoc())
{
    $activities[] = $record;
}
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">CFU</th>
      <th scope="col">Ore lezione</th>
      <th scope="col">Ore laboratorio</th>
      <th scope="col">Ore tirocinio</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($activities as $row)
    {
    ?>
    <tr>
      <th scope="row"><?php echo $row["codice"] ?></th>
      <td><?php echo $row["nome"] ?></td>
      <td><?php echo $row["CFU"] ?></td>
      <td><?php echo $row["lezione"] ?></td>
      <td><?php echo $row["laboratorio"] ?></td>
      <td><?php echo $row["tirocinio"] ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>