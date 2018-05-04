<?php

namespace App\Http\Controllers;

use App\Ongkir;
use Illuminate\Http\Request;

use Validator;

class OngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return csrf_token();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ongkir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $curl = curl_init();

        Validator::make($request->all(), [
            'city_origin' => 'required|integer',
            'city_destination' => 'required|integer',
            'weight' => 'required',
            'shipping' => 'required|string'
        ])->validate();

        $kota_asal      = $request->city_origin;
        $kota_tujuan    = $request->city_destination;
        $berat          = $request->weight;
        $kurir          = $request->shipping;

        $POST_DATA = "origin=".$kota_asal."&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir;

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $POST_DATA,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: ".env('ONGKIR_KEY')
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function show(Ongkir $ongkir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function edit(Ongkir $ongkir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ongkir $ongkir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ongkir $ongkir)
    {
        //
    }
}
