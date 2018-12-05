<h1>Intentions</h1>
<hr>
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Location</th>
      <th scope="col">Class</th>
      <th scope="col">Variety</th>
      <th scope="col">Tonnage</th>
      <th scope="col">Delivered</th>
      <th scope="col">Balance</th>

    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($results as $key => $value) {
        echo "<tr><td>" . $value["Location"] . "</td><td>" . $value["Grade"] . "</td><td>" . $value["Variety"] . "</td><td>" . $value["IntentionTonnage"] . "</td><td>" . $value["Delivered"] . "</td><td>" . $value["Balance"] . "</td></tr>";
      }
     ?>
  </tbody>
</table>
