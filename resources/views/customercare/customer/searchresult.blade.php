@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customer Information</h5>
                    <p class="card-text">{{ $customer ->surname}} {{ $customer ->first_name}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection