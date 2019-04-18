@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Meter Reading Portal</div>
                <p class="card-text p-2">From this screen you can enter customer readings. The system will calculate
                    consumption. You can search by using the Customer ID or Meter Number<br><i>You will not be able to
                        edit previously saved data.</i></p>

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

                <form method="post" action="{{ route('reading.search') }}">
                    {{ csrf_field() }}
                    <div class="form-row align-items-center p-2">
                        <div class="form-group col-md-5">
                            <input type="number" class="form-control" name="customer_id" placeholder="Customer ID"
                                value="{{ old('customer_id') }}">
                        </div>

                        <div class="form-group col-md-5">
                            <input type="name" class="form-control" name="meter_no" placeholder="Meter No."
                                value="{{ old('meter_no') }}">
                        </div>

                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary" disabled>Search</button>
                        </div>

                    </div>
                </form>




            </div>
        </div>



    </div>
</div>
</div>
@endsection