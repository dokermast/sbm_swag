<?php


namespace App;

use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Shipment
{
    public static function shipmentGetAll($token)
    {
        $response = Http::withToken($token)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->get(Url::SHIPMENT_URL);

        $response = json_decode($response->body(), true);

        return ($error_msg = isset($response['error']) ? $response['error'] : false) ?
            [ 'status' => false, 'msg' => $error_msg ] :
            [ 'status' => true, 'shipments' => $response['data']['shipments'] ];
    }


    public static function shipmentPost($token, $data)
    {
        $response = Http::withToken($token)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post(Url::SHIPMENT_URL, $data);

        $response = json_decode($response->body(), true);

        return (isset($response['data']) && $response['data']['id'] == $data['id']) ?
            ['status' => true, 'msg' => 'Shipment was created'] :
            ['status' => false, 'msg' => $response['message']];
    }


    public static function shipmentGetOne($token, $id)
    {
        $response = Http::withToken($token)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->get(Url::SHIPMENT_URL.'/'.$id);

        $response = json_decode($response->body(), true);

        return ($error_msg = isset($response['error']) ? $response['error'] : false) ?
            [ 'status' => false, 'msg' => $error_msg ] :
            [ 'status' => true, 'shipment' => $response['data'] ];
    }


    public static function shipmentPut($token, $data, $id)
    {
        $response = Http::withToken($token)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->put(Url::SHIPMENT_URL.'/'.$id, $data);

        $response = json_decode($response->body(), true);

        return (isset($response['data']) && $response['data']['id'] == $data['id']) ?
            ['status' => true, 'msg' => 'Shipment was updated'] :
            ['status' => false, 'msg' => $response['message']];
    }


    public static function shipmentDelete($token, $id)
    {
        $response = Http::withToken($token)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->delete(Url::SHIPMENT_URL.'/'.$id);
    }
}
