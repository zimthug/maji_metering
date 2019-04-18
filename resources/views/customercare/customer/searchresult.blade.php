@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header">Customer Information</h5>
                    <p class="card-text">{{ $customer ->surname}} {{ $customer ->first_name}}
                        {{ $customer ->other_names}}
                    </p>

                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="card-header">Address</h5>
                            <p> {{ $customer->address }} </p>
                            <p> {{ $customer->street }} </p>
                            <p><b> {{ $town_name }} </b></p>
                            <hr>
                            <p><a href="mailto:{{ $customer->email }}"> {{ $customer->email }}</a></p>
                        </div>

                        <div class="col-sm-6">
                            <h5 class="card-header">Other Details</h5>
                            <p> {{ $status_desc }}</p>
                            <p> {{ $customer->connection_date }} </p>
                            <p>
                                @isset($customer->disconnection_date)
                                {{ $customer->disconnection_date }}
                                @else
                                2999-12-31
                                @endisset
                            </p>
                            <a href="#" class="btn btn-primary">Edit Customer</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection