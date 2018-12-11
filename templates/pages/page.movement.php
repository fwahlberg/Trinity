<div class="card movement-report">
  <h4>Load Details</h4>
  <hr>
  <p><strong>Date:</strong> <?php echo $movement->Date; ?></p>
  <p><strong>Location:</strong> <?php echo $movement->Location; ?></p>
  <p><strong>Collection Reference / Fixing Number Number:</strong> <?php echo $movement->CollectRef; ?> / <?php echo $movement->FixingNo; ?></p>
  <p><strong>Passport:</strong> <?php echo $movement->Passport; ?> </p>
    <p><strong>Type:</strong> <?php echo $movement->Loadtype; ?> </p>
  <hr>
  <div class="row">
    <div class="col-lg-6">
      <p class="text-muted">Product Details</p>
      <table class="table">
        <tbody>
          <tr>
            <td><strong>Goods:</strong></td>
            <td><?php echo $movement->Commodity; ?></td>
          </tr>
          <tr>
            <td><strong>Grade:</strong></td>
            <td><?php echo $movement->Grade; ?></td>
          </tr>
          <tr>
            <td><strong>Variety</strong></td>
            <td><?php echo $movement->Variety; ?></td>
          </tr>
          <tr>
            <td><strong>Pool</strong></td>
            <td><?php echo $movement->Marketing; ?></td>
          </tr>

        </tbody>
      </table>
    </div>

    <div class="col-lg-6">
      <p class="text-muted">Movement Details</p>
      <table class="table">
        <tbody>
          <tr>
            <td><strong>Member's Name</strong></td>
            <td><?php echo $movement->ClientName; ?></td>
          </tr>
          <tr>
            <td><strong>Haulier</strong></td>
            <td><?php echo $movement->Haulier; ?></td>
          </tr>
          <tr>
            <td><strong>Reg. No.</strong></td>
            <td><?php echo $movement->Vreg; ?></td>
          </tr>
          <tr>
            <td ><strong>Weight</strong></td>
            <td ><?php echo $movement->Gross_MT; ?> MT</td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <p class="text-muted">Lab Results, Deductions and Charges</p>
      <table class="table col-lg-12">
<thead>
  <tr><th >Description</th><th >Value</th><th >Deduction</th><th >Charge</th></tr>
</thead>
        <tbody>
          <tr>
            <td >Moisture</td>
            <td ><?php echo $movement->Moist; ?> %</td>
            <td ><?php echo $movement->DryLoss; ?></td>
            <td >£<?php echo $movement->DryCharge * $movement->Gross_MT; ?></td>
          </tr>
          <tr>
            <td >Screenings</td>
            <td ><?php echo $movement->Screenings; ?> %</td>
            <td ><?php echo $movement->ScreenLoss; ?></td>
            <td ></td>
          </tr>
          <tr>
            <td >Admix</td>
            <td ><?php echo $movement->Admix; ?> %</td>
            <td ><?php echo $movement->CleanLoss ?></td>
            <td ></td>
          </tr>
          <tr>
            <td >Specific Weight</td>
            <td ><?php echo $movement->Kghl; ?> Kg/Hl</td>
            <td ></td>
            <td ></td>
          </tr>
          <tr>
            <td >Ergot</td>
            <td ><?php echo $movement->Ergot; ?></td>
            <td ></td>
            <td ></td>
          </tr>
          <?php

          foreach ($QValues as $Label => $qValue) {
            echo '<tr><td>' . $Label . '</td><td>' . $movement->$qValue . '</td><td></td><td></td></tr>';
          }

          ?>
          <tr>
            <td >Storage Loss</td>
            <td ><?php echo round(($movement->StoreLoss/$movement->Gross_MT)*100); ?> %</td>
            <td ><?php echo $movement->StoreLoss; ?></td>
            <td ></td>
          </tr>
        </tbody>
      </table>
      <hr>

    </div>
  </div>
  <div class="row">
      <div class="col-lg-12">
        <p><strong>Final Dry Weight:</strong> <?php echo $movement->Nett_MT; ?> MT</p>
      </div>
  </div>
</div>
