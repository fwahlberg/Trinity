<div class="card movement-report">
  <h4>Load Details</h4>
  <hr>
  <p><strong>Date:</strong> <?php echo $movement->Date; ?></p>
  <p><strong>Location:</strong> <?php echo $movement->Location; ?></p>
  <p><strong>Collection Reference / Fixing Number Number:</strong> <?php echo $movement->CollectRef; ?> / <?php echo $movement->FixingNo; ?></p>
  <p><strong>Passport Number:</strong> <?php echo $movement->Passport; ?> </p>
    <p><strong>Type:</strong> <?php echo $movement->Loadtype; ?> </p>
  <hr>
  <div class="row">
    <div class="col-lg-3">
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

        </tbody>
      </table>
    </div>

    <div class="col-lg-9">
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
            <td >MOIST</td>
            <td ><?php echo $movement->Moist; ?> %</td>
            <td ><?php echo $movement->DryLoss; ?></td>
            <td >£<?php echo $movement->DryCharge; ?></td>
          </tr>
          <tr>
            <td >SPECIFIC WEIGHT</td>
            <td ><?php echo $movement->Kghl; ?> Kg/Hl</td>
            <td >0.000</td>
            <td ></td>
          </tr>
          <tr>
            <td >TEMP</td>
            <td ><?php echo $movement->Temp; ?></td>
            <td >0.000</td>
            <td ></td>
          </tr>
          <tr>
            <td >ADMIX</td>
            <td ><?php echo $movement->Admix; ?> %</td>
            <td >0.000</td>
            <td ></td>
          </tr>

          <tr>
            <td >SCREENINGS</td>
            <td ><?php echo $movement->Screenings; ?> %</td>
            <td >0.268</td>
            <td ></td>
          </tr>
          <tr>
            <td >ERGOT</td>
            <td ><?php echo $movement->Ergot; ?></td>
            <td >0.000</td>
            <td ></td>
          </tr>
          <tr>
            <td >GROSS WEIGHT</td>
            <td ><?php echo $movement->Gross_MT; ?> MT</td>
            <td >0.000</td>
            <td ></td>
          </tr>
          <tr>
            <td >NETT WEIGHT</td>
            <td ><?php echo $movement->Nett_MT; ?> MT</td>
            <td >0.000</td>
            <td ></td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
