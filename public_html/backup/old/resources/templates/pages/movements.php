<h1>Movements</h1>
<hr>
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Ticket #</th>
      <th scope="col">Commodity</th>
      <th scope="col">Client Name</th>
      <th scope="col">Date</th>
      <th scope="col">Gross Weight</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($results as $key => $value) {
        echo "<tr><td>" . $value["Ticket"] . "</td><td>" . $value["Commodity"] . "</td><td>" . $value["ClientName"] . "</td><td>" . $value["Date"] . "</td><td>" . $value["Gross_MT"] . "</td><td><a href=\"movement.php?id=" . $value["Ticket"] . "\"><i class=\"fas fa-external-link-square-alt\"></i></a></td></tr>";
      }
     ?>
  </tbody>
</table>
