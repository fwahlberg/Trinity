<?php

class Report {

  private $Movements = array();

  public function __get($property) {
      if (property_exists($this, $property)) {
        return $this->$property;
      }
  }

  public function __set($name, $value) {

        echo "Set:$name to $value";
        $this->$name = $value;
    }

  public function totalNettTonnage(){
    $total = 0;
    foreach ($this->Movements as $Movement) {
      // code...
      $total += $Movement->Nett_MT;
    }
    return $total;
  }

  public function totalGrossTonnage(){
    $total = 0;
    foreach ($this->Movements as $Movement) {
      // code...
      $total += $Movement->Gross_MT;
    }
    return $total;
  }
}
