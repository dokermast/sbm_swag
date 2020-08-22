@extends('layouts.basic')

@section('content')

    <div class="container">
        <div class="text-center"><h4>Shipment Show</h4></div>
        <br>
        <div class="text-center"><a href="{{ route('shipments') }}" class="btn btn-outline-secondary">To Shipments</a></div>
        <br>

        @if(isset($shipment))
            <table class="table table-hover table-striped">
                <tr>
                    <th>SHIPMENT ID</th>
                    <td>{{ $shipment['id'] }}</td>
                </tr>
                <tr>
                    <th>Shipment Name</th>
                    <td>{{ $shipment['name'] }}</td>
                </tr>
            </table>
        @endif

    </div>

@endsection


