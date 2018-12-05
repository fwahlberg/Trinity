<?php
class Commodity {

  private $commodityArray = array(
    1 => [
      'qValues' => [
        'Hagberg' => 'Q1',
        'Protein' => 'Q2',
        'Don' => 'Q3',
        'Ergot P in K' => 'Q4',
        'Sprouted Grains' => 'Q5',
        'Zon' => 'Q6'
        ]
      ],

      2 => [
        'qValues' => [
          'Nitrogen' => 'Q1',
          'Over 2.5 Scrn' => 'Q2',
          'Thru 2.25' => 'Q3',
          'Germ' => 'Q4',
          'Pre Germ' => 'Q5',
          'PreG Slight' => 'Q6'
          ]
        ],

        4 => [
          'qValues' => [
            'Bruchid' => 'Q1',
            'Stains' => 'Q2',
            ]
          ],

          5 => [
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
   $commodity = $Movement->CommodityNo;

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
