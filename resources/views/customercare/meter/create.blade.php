@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Meter</div>
                <p class="card-text p-2">With supporting text below as a natural lead-in to additional content.</p>

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

                <form method="post" action="{{ route('meter.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group row p-2">
                        <label for="meter_no" class="col-sm-2 col-form-label">Meter No.</label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control" name="meter_no" placeholder="Meter No." required
                                value="{{ old('meter_no') }}">
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="meter_type" class="col-sm-2 col-form-label">Meter Type</label>
                        <div class="col-sm-8">
                            <select name="meter_type" class="form-control">
                                <option selected value="">Choose...</option>
                                @foreach($meter_types as $code => $code_desc)
                                <option value="{{ $code }}">
                                    {{ $code_desc }}
                                </option>
                                @endforeach

                            </select>
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