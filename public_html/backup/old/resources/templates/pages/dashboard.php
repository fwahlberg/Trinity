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
                  <?php echo $result["Name"]?></a></h2>
              <h6 class="d-block">
                <?php echo $result["Name"]?><br>
                <?php echo $result["Addr1"]?><br>
                <?php echo $result["Addr2"]?><br>
                <?php echo $result["Town"]?><br>
                <?php echo $result["County"]?><br>
                <?php echo $result["Postcode"]?>
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
                    <?php echo $result["Mobile"]; ?>
                  </div>
                </div>
                <hr />

                <div class="row">
                  <div class="col-sm-3 col-md-2 col-5">
                    <label style="font-weight:bold;">Phone</label>
                  </div>
                  <div class="col-md-8 col-6">
                    <?php echo $result["Tel1"]?>
                  </div>
                </div>
                <hr />


                <div class="row">
                  <div class="col-sm-3 col-md-2 col-5">
                    <label style="font-weight:bold;">Email</label>
                  </div>
                  <div class="col-md-8 col-6">
                    <?php echo $result["email"]; ?>
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
                    <?php echo $result["AccountCode"]; ?>
                  </div>
                </div>
                <hr />

                <div class="row">
                  <div class="col-sm-3 col-md-2 col-5">
                    <label style="font-weight:bold;">Owned Space</label>
                  </div>
                  <div class="col-md-8 col-6">
                    <?php echo $result["OwnedSpace"]?>
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
