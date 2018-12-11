
<!-- Page Content -->
<h1>Your Member Details</h1>
<hr>
<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-body">
        <div class="card-title mb-4">
          <div class="d-flex justify-content-start">
            <div class="userData ml-3">
              <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">
                  <?php echo $account->Name ?></a></h2>
              <h6 class="d-block">
                <?php
                    //Print off each Address Line
                    foreach ($account->Address() as $addressLine) {
                        echo (!empty($addressLine) ? $addressLine . "<br>" : "");
                    }
                  ?>
              </h6>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="accountInfo-tab" data-toggle="tab" href="#accountinfo" role="tab" aria-controls="basicInfo" aria-selected="true">Account Info</a>
              </li>
            </ul>
            <div class="tab-content ml-1" id="myTabContent">
              <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                <div class="row">
                  <div class="col-sm-3 col-md-2 col-5">
                    <label style="font-weight:bold;">Mobile</label>
                  </div>
                  <div class="col-md-8 col-6">
                    <?php echo $account->Mobile; ?>
                  </div>
                </div>
                <hr />

                <div class="row">
                  <div class="col-sm-3 col-md-2 col-5">
                    <label style="font-weight:bold;">Phone</label>
                  </div>
                  <div class="col-md-8 col-6">
                    <?php
                    //Print off each Phone Number
                    foreach ($account->Numbers() as $number) {
                        echo (!empty($number) ? $number . "<br>" : "");
                    }

                      ?>
                  </div>
                </div>
                <hr />


                <div class="row">
                  <div class="col-sm-3 col-md-2 col-5">
                    <label style="font-weight:bold;">Email</label>
                  </div>
                  <div class="col-md-8 col-6">
                    <?php echo $account->email; ?>
                  </div>
                </div>
                <hr />

              </div>
              <div id="accountinfo" class=" tab-pane"><br>
                <div class="row">
                  <div class="col-sm-3 col-md-2 col-5">
                    <label style="font-weight:bold;">Account Code</label>
                  </div>
                  <div class="col-md-8 col-6">
                    <?php echo $account->AccountCode; ?>
                  </div>
                </div>
                <hr />

                <div class="row">
                  <div class="col-sm-3 col-md-2 col-5">
                    <label style="font-weight:bold;">Storage Rights</label>
                  </div>
                  <div class="col-md-8 col-6">
                    <?php echo $account->OwnedSpace; ?>
                  </div>
                </div>
                <hr />
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
