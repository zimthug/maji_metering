@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h5 class="card-header">Assign Meters</h5>
                <p class="card-text p-2">Use this page to assign meters to customers</p>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif

                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif

                <form method="post" action="{{ route('meter.assignment') }}">
                    {{ csrf_field() }}
                    <div class="form-group row p-2">
                        <label for="customer_id" class="col-sm-2 col-form-label">Customer ID</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="customer_id" placeholder="Customer ID"
                                required value="{{ old('customer_id') }}">
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="inlet_meter_no" class="col-sm-2 col-form-label">Inlet Meter No.</label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control" name="inlet_meter_no" placeholder="Inlet Meter No."
                                required value="{{ old('inlet_meter_no') }}">
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="outlet_meter_no" class="col-sm-2 col-form-label">Outlet Meter No.</label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control" name="outlet_meter_no"
                                placeholder="Outlet Meter No." required value="{{ old('outlet_meter_no') }}">
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="inlet_meter_status" class="col-sm-2 col-form-label">Inlet Status</label>
                        <div class="col-sm-8">
                            <select name="inlet_meter_status" class="form-control">
                                <option selected value="">Choose...</option>
                                @foreach($meter_status as $code => $code_desc)
                                <option value="{{ $code }}">
                                    {{ $code_desc }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="outlet_meter_status" class="col-sm-2 col-form-label">Outlet Status</label>
                        <div class="col-sm-8">
                            <select name="outlet_meter_status" class="form-control">
                                <option selected value="">Choose...</option>
                                @foreach($meter_status as $code => $code_desc)
                                <option value="{{ $code }}">
                                    {{ $code_desc }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row p-2">
                        <div class="form-group col-md-6">
                            <label for="date_installed">Date Installed</label>
                            <input type="date" class="form-control" name="date_installed">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date_removed">Disconnection Date</label>
                            <input type="date" class="form-control" name="date_removed">
                        </div>
                    </div>

                    <div class="form-row p-2">
                        <div class="form-group col-md-6">
                            <button type="cancel" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection