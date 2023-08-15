@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Staff Page</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Address</th>
                            <th>Birthday</th>
                            <th>Sex</th>
                            <th>Status</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCustomerStaff as $key => $customer )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $customer->last_name }}</td>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->middle_name }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->birthday }}</td>
                                <td>{{ $customer->sex }}</td>
                                <td>{{ $customer->civil_status }}</td>
                                <td>{{ $customer->contact_number }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->product }}</td>
                                <td>{{ $customer->price }}</td>
                                <td>{{ $customer->payment }}</td>
                                <td>
                                    <a href="{{ url('/staff/edit/' .$customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('/staff/print/' .$customer->id) }}" class="btn btn-danger btn-sm">Print</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection