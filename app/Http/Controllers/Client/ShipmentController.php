<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shipment;

class ShipmentController extends Controller
{
    public function shipment()
    {
        $shipments = Shipment::shipmentGetAll(session('token'));

        return ($shipments['status'] && count($shipments) > 0) ?
            view('shipments.shipments', (['shipments' => $shipments['shipments']])) :
            redirect('/')->withErrors($shipments['msg']);
    }


    public function store(Request $request)
    {
        $response = Shipment::shipmentPost(session('token'), $request->only(['id', 'name']));

        return $response['status'] ? redirect('shipment')->with(['status' => $response['msg']]) :
            redirect('/')->withErrors($response['msg']);
    }


    public function show($id)
    {
        $shipment = Shipment::shipmentGetOne(session('token'), $id);

        return ($shipment['status']) ?
            view('shipments.show', (['shipment' => $shipment['shipment']])) :
            redirect('/')->withErrors($shipment['msg']);
    }


    public function edit($id)
    {
        $shipment = Shipment::shipmentGetOne(session('token'), $id);

        return ($shipment['status']) ?
            view('shipments.edit', (['shipment' => $shipment['shipment']])) :
            redirect('/')->withErrors($shipment['msg']);
    }


    public function update(Request $request, $id)
    {
        $response = Shipment::shipmentPut(session('token'), $request->only(['id', 'name']), $id);

        return ($response['status']) ?
            redirect('shipment')->with('status', $response['msg']) :
            redirect('/')->withErrors($response['msg']);
    }


    public function destroy($id)
    {
        Shipment::shipmentDelete(session('token'), $id);

        return redirect('shipment')->with('status', "Shipment was deleted");
    }

}
