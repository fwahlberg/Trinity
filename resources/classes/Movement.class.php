<?php

class Movement extends DB implements JsonSerializable {
    private $id ="";
    private $ClientID ="";
    private $Member ="";
    private $Ticket ="";
    private $LocationNo ="";
    private $Location ="";
    private $Contract ="";
    private $ClientName ="";
    private $LoadtypeNo ="";
    private $Loadtype ="";
    private $DelRef ="";
    private $CollectRef ="";
    private $Passport ="";
    private $Date ="";
    private $Gross_MT ="";
    private $Nett_MT ="";
    private $Haulier ="";
    private $Vreg ="";
    private $CommodityNo ="";
    private $Commodity ="";
    private $Grade ="";
    private $Variety ="";
    private $Marketing ="";
    private $Moist ="";
    private $Admix ="";
    private $Screenings ="";
    private $Kghl ="";
    private $Temp ="";
    private $Q1 ="";
    private $Q2 ="";
    private $Q3 ="";
    private $Q4 ="";
    private $Q5 ="";
    private $Q6 ="";
    private $Ergot ="";
    private $DryLoss ="";
    private $CleanLoss ="";
    private $ScreenLoss ="";
    private $StoreLoss ="";
    private $DryCharge ="";
    private $FixingNo ="";
    private $link ="";
    private $prettyLink ="";

    public function __construct() {
        $this->link = "movement.php?id=" . $this->id;
        $this->prettyLink = "<a href=\"movement.php?id=" . $this->id . "\"><i class=\"fas fa-external-link-square-alt\"></i></a>";
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }

     public function jsonSerialize()
    {
        return get_object_vars($this);
    }


}
