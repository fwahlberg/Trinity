<?php

class Intention extends DB implements JsonSerializable {
    private $ClientID;
    private $Member;
    private $Location;
    private $Grade;
    private $Variety;
    private $IntentionTonnage;
    private $Delivered;
    private $Balance;
    private $MarketingPool;
    
    public function __construct() {
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