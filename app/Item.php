<?php


namespace App;

use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Item
{
    public static function itemPost($token, $data)
    {
        $response = Http::withToken($token)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post(Url::ITEM_URL, $data);

        $response = json_decode($response->body(), true);

        return (isset($response['data']) && $response['data']['id'] == $data['id']) ?
            ['status' => true, 'msg' => 'Item was created'] :
            ['status' => false, 'msg' => $response['message']];
    }

}
