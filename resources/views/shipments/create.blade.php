@extends('layouts.basic')

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Shipment</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('shipment_store') }}" method="POST">

                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Shipments ID</label>
                                <input id="id" name="id" type="number" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Shipment NAME</label>
                                <input id="name" name="name" type="text" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div id="item">

                        <div class="row item">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Item ID</label>
                                    <input id="id" name="item_id" type="number" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Item NAME</label>
                                    <input id="name" name="item_name" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <button style="margin-top: 32px;" type="button" onclick="rmItem(this)" class="btn btn-secondary remove">Remove</button>
                            </div>
                        </div>

                    </div>

                    <div class="text-center">
                        <button type="button" onclick="addItem()" class="btn btn-secondary">Add Item</button>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">CREATE</button>

                    <a href="{{ route('shipments') }}" class="btn btn-primary">To Shipments</a>

                </form>
            </div>
        </div>
    </div>


@endsection


@push('scripts')
    <script>
        $('.remove')[0].setAttribute('hidden', true);
        function addItem(){
            $('.remove')[0].removeAttribute('hidden');
            $("#item").append($('.item').clone()[0]);
            $('.remove')[0].setAttribute('hidden', true);
        }
        function rmItem(elem){ elem.closest('.item').remove(); }
    </script>
@endpush
