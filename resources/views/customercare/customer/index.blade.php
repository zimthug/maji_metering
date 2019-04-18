@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Search Customer</h5>
                    <p class="card-text">Put the Customer ID or Meter Number to Search</p>

                    <form method="post" action="{{ route('searchresult') }}">
                        {{ csrf_field() }}
                        <div class="form-group row p-2">
                            <label for="customer_id" class="col-sm-3 col-form-label">Customer ID</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="customer_id"
                                    value="{{ old('customer_id') }}">
                            </div>
                        </div>

                        <div class="form-group row p-2">
                            <label for="meter_no" class="col-sm-3 col-form-label">Meter No</label>
                            <div class="col-sm-6">
                                <input type="name" class="form-control" name="meter_no" value="{{ old('meter_no') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create New Customer</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('customer.create') }}" class="btn btn-success">Create Customer</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection