@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>
                    Details
                    <a href="{{ route('customer') }}" class="btn btn-primary float-end">Update Credentials</a>
                </h4>
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
                            <th>Civil Status</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ Auth::user()->id }}</td>
                                <td>{{ Auth::user()->last_name }}</td>
                                <td>{{ Auth::user()->first_name }}</td>
                                <td>{{ Auth::user()->middle_name }}</td>
                                <td>{{ Auth::user()->address }}</td>
                                <td>{{ Auth::user()->birthday }}</td>
                                <td>{{ Auth::user()->sex }}</td>
                                <td>{{ Auth::user()->civil_status }}</td>
                                <td>{{ Auth::user()->contact_number }}</td>
                                <td>{{ Auth::user()->email }}</td>
                                <td>{{ Auth::user()->product }}</td>
                                <td>{{ Auth::user()->price }}</td>
                                <td>
                                    <a href="{{ url('/print/' . Auth::user()->id) }}" class="btn btn-danger btn-sm">Print</a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection