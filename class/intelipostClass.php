<?php

class InteliPost
{
     private $base_url = 'https://api.intelipost.com.br/api/v1/';
     private $header;

     /**
     * Construct
     *
     * @access public
     * @param  $base_url
     * @throws \ErrorException
     */
    public function __construct()
    {
        if (!extension_loaded('curl')) {
            throw new \ErrorException('cURL library is not loaded');
        }
        $this->header = array(
                              "api_key: 9009f95101bf48b01a50928a2a71ed1ae9083fc1d3c08439b0613dfc38e656c5",
                              "content-type: application/json",
                              "platform: intelipost-docs"
                        );
    }

      /**
      * Get Quot
      * 
      * @access public
      * @param $base_url
      * @param $requestParam
      */
    public function getQuote($requestParam=array()){
      $url = $this->base_url.'quote';
      if(!empty($requestParam)){
        $requestParam['additional_information']=array(
          "free_shipping" => false,
          "extra_cost_absolute" => 0,
          "extra_cost_percentage" => 0,
          "lead_time_business_days" => 0,
          "sales_channel" => "hotsite",
          "tax_id" => "22337462000127",
          "client_type" => "gold",
          "payment_type" => "CIF",
          "is_state_tax_payer" => false,
          "delivery_method_ids" => array('1','2','3')
        );

        $requestParam['identification']=array(
          "session" => "04e5bdf7ed15e571c0265c18333b6fdf1434658753",
          "page_name" => "carrinho",
          "url" => "http://www.intelipost.com.br/checkout/cart/"
        );
      }

      $response = $this->curlExecute($url,json_encode($requestParam),'POST');

      return $response;
    }
 
       /**
      * Get Quot
      * 
      * @access public
      * @param $url
      * @param $curl_request
      * @param $requestParam
      */
    private function curlExecute($url,$requestParam,$curl_request='GET'){
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $curl_request,
        CURLOPT_HTTPHEADER => $this->header,
      ));
      if( $curl_request == 'POST'){
        curl_setopt($curl, CURLOPT_POSTFIELDS, $requestParam);
      }

      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        return $response;
      }

    }
}