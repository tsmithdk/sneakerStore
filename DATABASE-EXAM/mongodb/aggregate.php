<?php
ini_set('display_errors', 1);
require_once __DIR__.'/connect.php';
try{

    /************************** AVERAGE AGGREGATION ****************************/

  /*  $aShowAggregation = $collectionUpcomingSneakers->aggregate([ ['$group'=>
                                                                    ["_id"=>"result",
                                                                     "average"=>
                                                                        ['$avg'=>'$price']
                                                                    ]
                                                                ]
                                                             ]); */

 /**************************  MAX & MIN AGGREGATION ****************************/
/*  $aShowAggregation = $collectionUpcomingSneakers->aggregate([ ['$group'=>
                                                                    ["_id"=>'$brand', //point to
                                                                     "max"=>
                                                                        ['$max'=>'$price'],
                                                                     "min"=>
                                                                        ['$min'=>'$price']
                                                                    ]
                                                                ]
                                                             ]);
 */
/**************************  COUNT & GRATER THAN OR LESS THAN AGGREGATION ****************************/

/* $aShowAggregation = $collectionUpcomingSneakers->aggregate([ ['$match'=>
     ["price"=>['$gt'=> 1000] //point to
      ]
],[ '$count'=> "amount_of_items_not_included_in_that_range"]

]); */

/**************************  GREATER AND LESS THAN AGGREGATION ****************************/

    $aShowAggregation = $collectionUpcomingSneakers->aggregate([ ['$match'=>
     ["price"=>['$gt'=> 1000, '$lt'=>2000] //point to
      ]
],[ '$count'=> "amount_of_items_not_included_in_that_range"]

]);


echo  json_encode(iterator_to_array($aShowAggregation, true), true);

/**************************  DISTINCT AGGREGATION ****************************/

$ajSneakers = $collectionUpcomingSneakers->distinct("brand");
var_dump($ajSneakers);



    echo '{"status":1, "message":"success"}';
}catch(MongoException $ex){
    echo '{"status":0, "message":"error"}';
}

