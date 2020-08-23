@extends('layouts.basic')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Item</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('item_store') }}" method="POST">

                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Item ID</label>
                                <input name="id" type="number" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Shipment ID</label>
                                @if(isset($shipments))
                                    <div class="ol-sm-2">
                                        <select class="form-control" name="shipment_id">
                                            @foreach( $shipments as $el)
                                                <option value="{{ $el['id'] }}"> {{ $el['name'] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input name="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Item CODE</label>
                                <input name="code" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">CREATE</button>

                    <a href="{{ route('shipments') }}" class="btn btn-primary">To Shipments</a>

                </form>
            </div>
        </div>
    </div>

@endsection
