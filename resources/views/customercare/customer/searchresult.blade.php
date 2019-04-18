@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header">Customer Information - Customer ID {{ $customer->customer_id }}</h5>
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

    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-header">Metering Info - Customer ID {{ $customer->customer_id }}</h6>

                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h5 class="card-header">Current Data</h5>

                            @foreach ($currentMeterData as $meter)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Number</td>
                                        <th>Rdng</th>
                                        <th>Cons</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>Inlet</td>
                                    <td>{{  $meter->dom_meter }}</td>
                                    <td>{{  $meter->dom_meter_reading }}</td>
                                    <td>{{  $meter->consumption }}</td>
                                </tr>

                                <tr>
                                    <td>Outlet</td>
                                    <td>{{  $meter->bulk_meter }}</td>
                                    <td>{{  $meter->bulk_meter_reading }}</td>
                                    <td>{{  $meter->bulk_consumption  }}</td>
                                </tr>
                            </table>
                            <hr>

                            <p><i>You have {{  $meter->remaining_units  }} units to use</i></p>
                            <p>Billing Period {{  $meter->period  }}</p>
                            <p>Reading Date {{  $meter->reading_date  }}</p>
                            @endforeach

                        </div>

                        <div class="col-sm-7">
                            <h5 class="card-header">Historical Data</h5>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Date</td>
                                        <td>Outlet</td>
                                        <td>Consmpt</td>
                                        <td>Inlet</td>
                                        <td>Received</td>
                                        <td>Remain</td>
                                    </tr>
                                </thead>
                                @foreach ($historicalMeterData as $historical)
                                <tr>
                                    <td>{{ $historical->reading_date }}</td>
                                    <td>{{ $historical->dom_meter_reading }}</td>
                                    <td>{{ $historical->consumption }}</td>
                                    <td>{{ $historical->bulk_meter_reading }}</td>
                                    <td>{{ $historical->bulk_consumption }}</td>
                                    <td>{{ $historical->remaining_units }}</td>
                                </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection