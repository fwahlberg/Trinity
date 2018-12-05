<?php
class Account extends DB {

    private $clientID;
    private $Name = "";
    private $Addr1 = "";
    private $Addr2 = "";
    private $Addr3 = "";
    private $Addr4 = "";
    private $Town = "";
    private $County ="";
    private $Postcode = "";
    private $Tel1 = "";
    private $Tel2 = "";
    private $Tel3 = "";
    private $Mobile ="";
    private $email ="";
    private $AccountCode ="";
    private $OwnedSpace = "";



    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }

    /*Returns all numbers in array */
    function getNumbers() {
        return array(
            "Tel1" => $this->Tel1,
            "Tel2" => $this->Tel2,
            "Tel3" => $this->Tel3,
            );
    }

    /*
    Alias method of getNumbers() */
    function Numbers() {
        return $this->getNumbers();
    }

    function getAddress() {
        return array(
            "Addr1" => $this->Addr1,
            "Addr2" => $this->Addr2,
            "Addr3" => $this->Addr3,
            "Addr4" => $this->Addr4,
            "Town" => $this->Town,
            "County" => $this->County,
            "Postcode" => $this->Postcode
        );
    }

    function Address() {
        return $this->getAddress();
    }
}
