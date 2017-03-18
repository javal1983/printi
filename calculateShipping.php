<?php

  if(!empty($_POST)){
  $delivery_options = array();
  include('\class\intelipostClass.php');
  $inteliPost = new InteliPost();
    $requestParam = array(
     "origin_zip_code" => $_POST['origin_zip_code'],
     "destination_zip_code" => $_POST['destination_zip_code'],
     "volumes" => array( array(
          "weight" => $_POST['weight'],
          "volume_type" => $_POST['volume_type'],
          "cost_of_goods" => $_POST['cost_of_goods'],
          "width" => $_POST['width'],
          "height" => $_POST['height'],
          "length" => $_POST['length']
        )));
        $calculateShippingResponse = $inteliPost->getQuote($requestParam);
        $calculateShippingObject = json_decode($calculateShipping);
        if($calculateShippingObject->status == 'OK'){
          if(count($calculateShippingObject->content->delivery_options) > 0){
            foreach($calculateShippingObject->content->delivery_options as $d){
              $delivery_options[]=array(
                'delivery_estimate_business_days' => $d->delivery_estimate_business_days,
                'final_shipping_cost' => $d->final_shipping_cost,
                'description' => $d->description
              );
            }
          }
          echo json_encode($delivery_options);
        }else{
          echo json_encode(array('errorMessage' => $calculateShippingObject->messages)); 
        }
        
}else{
  echo json_encode(array('Post Data is Empty'))
}

?>
