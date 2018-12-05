<h1><?php echo $grade; ?> Report</h1>
<hr>
<table class="table" id="reportTable">
  <thead>
    <tr>
      <th scope="col">Ticket #</th>
      <th scope="col">Date</th>
      <th scope="col">Variety</th>
      <th scope="col">Gross Tonnage</th>
      <th scope="col">Nett Tonnage</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Report->Movements as $Movement) {
      // code...
      echo '<tr>
      <td>' . $Movement->Ticket . '</td>
      <td>' . $Movement->Date . '</td>
      <td>' . $Movement->Variety . '</td>
      <td>' . $Movement->Gross_MT . '</td>
      <td>' . $Movement->Nett_MT . '</td>
      <td>' . $Movement->prettyLink . '</td>
      </tr>';
    //  var_dump($Movement);
    }
    echo '<tfoot><tr><td></td><td></td><td></td><td><strong>' . $Report->totalGrossTonnage() . '</strong></td><td><strong>' . $Report->totalNettTonnage() . '</strong></td><td></td></tr></tfoot>'
    ?>
  </tbody>
</table>
