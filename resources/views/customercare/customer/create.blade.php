@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Customer</div>
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

                <form method="post" action="{{ route('customer.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group row p-2">
                        <label for="surname" class="col-sm-2 col-form-label">Surname</label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control" name="surname" placeholder="Surname" required>
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control" name="firstname" placeholder="First Name">
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="other_name" class="col-sm-2 col-form-label">Other Name</label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control" name="other_name" placeholder="Other Name">
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control" name="address" placeholder="House Number" required>
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="street" class="col-sm-2 col-form-label">Street</label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control" name="street" placeholder="Street">
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="town" class="col-sm-2 col-form-label">Town</label>
                        <div class="col-sm-8">
                            <select name="town" class="form-control">
                                <option selected>Choose...</option>
                                @foreach($towns as $town_id => $town)
                                <option value="{{ $town_id }}">
                                    {{ $town }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="customer_status" class="col-sm-2 col-form-label">Customer Status</label>
                        <div class="col-sm-8">
                            <select name="customer_status" class="form-control" required>
                                <option selected value="">Choose...</option>
                                @foreach($customer_status as $code => $code_desc)
                                <option value="{{ $code }}">
                                    {{ $code_desc }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row p-2">
                        <div class="form-group col-md-6">
                            <label for="connection_date">Connection Date</label>
                            <input type="date" class="form-control" name="connection_date">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="disconnection_date">Disconnection Date</label>
                            <input type="date" class="form-control" name="disconnection_date">
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
</div>
@endsection