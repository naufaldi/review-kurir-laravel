<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCity($url = "/city")
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => env('RAJAONGKIR_URL').$url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: " . env('ONGKIR_KEY')
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function getCityByProvince($province)
    {  
        $url = "/city?province=".$province;
        return $this->getCity($url);
    }

    public function getCityById($province, $id)
    {
        $url = "/city?province=".$province."&id=".$id;
        return $this->getCity($url);
    }
}
