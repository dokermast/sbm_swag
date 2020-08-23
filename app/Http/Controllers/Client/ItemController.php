<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Shipment;

class ItemController extends Controller
{
    public function create()
    {
        $shipments = Shipment::shipmentGetAll(session('token'));

        return ($shipments['status']) ?
            view('items.create', (['shipments' => $shipments['shipments']])) :
            redirect('/')->withErrors($shipments['msg']);
    }


    public function store(Request $request)
    {
        $response = Item::itemPost(session('token'), $request->only(['id', 'shipment_id', 'name', 'code']));

        return $response['status'] ? redirect('shipment')->with(['status' => $response['msg']]) :
            redirect('/')->withErrors($response['msg']);
    }


}
