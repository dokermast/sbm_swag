@extends('layouts.basic')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Shipment</h3>
            </div>
            <div class="card-body">

                @if(isset($shipment))

                    <form action="{{ route('shipment_update', $shipment['id']) }}" method="POST">

                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Shipments ID</label>
                                    <input id="id" name="id" type="number" class="form-control" value="{{ $shipment['id'] }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Shipment NAME</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{ $shipment['name'] }}">
                                </div>
                            </div>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-warning">Update</button>

                        <a href="{{ route('shipments') }}" class="btn btn-primary">To Shipments</a>

                    </form>

                @endif
            </div>
        </div>
    </div>

@endsection
