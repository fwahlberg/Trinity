<?php
class Commodity {

  private $commodityArray = array(
    'Wheat' => [
      'qValues' => [
        'Hagberg' => 'Q1',
        'Protein' => 'Q2',
        'Don' => 'Q3',
        'Ergot P in K' => 'Q4',
        'Sprouted Grains' => 'Q5',
        'Zon' => 'Q6'
        ]
      ],

      'Barley' => [
        'qValues' => [
          'Nitrogen' => 'Q1',
          'Over 2.5 Scrn' => 'Q2',
          'Thru 2.25' => 'Q3',
          'Germ' => 'Q4',
          'Pre Germ' => 'Q5',
          'PreG Slight' => 'Q6'
          ]
        ],

        'Oilseed Rape' => [
          'qValues' => [
            'Oil' => 'Q1',
            'Euric Acid' => 'Q2',
            'Imm Grain' => 'Q3',
            'Red/Brown Seed' => 'Q4',
            'Rancid/Burnt Seed' => 'Q5'
            ]
          ]
  );

  public function labelQValuesFromMovement($Movement) {
   $commodity = $Movement->Commodity;

    if(array_key_exists($commodity, $this->commodityArray)){
      return $this->commodityArray[$commodity]['qValues'];
    } else {
     return array();
   }

  }

  public function QValues($Q) {
    return $this->labelQValuesFromMovement($Q);
  }
}
