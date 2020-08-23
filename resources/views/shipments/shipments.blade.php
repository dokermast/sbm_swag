@extends('layouts.basic')

@section('content')
    <div class="container">
        <div class="text-center"><h3>SHIPMENTS</h3></div>
        <div class="text-center">
            <a class="btn btn-secondary btn-sm" href="{{ route('welcome') }}">Welcome Page</a>
        </div>
        <br>
        <div class="container">
            @if (isset($shipments))
                <div class="text-center">
                    <a class="btn btn-outline-primary" href="{{ route('shipment_create') }}">Create Shipment</a>
                    <a class="btn btn-outline-primary" href="{{ route('item_create') }}">Create Item</a>
                </div>
                <br>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Shipment Name</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach ($shipments as $item)
                        <tr>
                            <td>{{ $item['id']}}</td>
                            <td>{{ $item['name']}}</td>
                            <td>
                                <form action="{{ route('shipment_show', $item['id']) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-outline-success" title="Show">Show</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('shipment_edit', $item['id']) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-outline-warning" title="Edit">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('shipment_delete', $item['id']) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="text-center"><h4>NO ShipmentsList</h4></div>
            @endif
        </div>
    </div>
@endsection
