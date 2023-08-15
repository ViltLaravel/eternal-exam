@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Hey!</strong>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>   
            </div>
        @endif 
        <div class="card">
            <div class="card-header">
                <h4>
                    Admin Page
                    <a href="{{ url('/admin/create') }}" class="btn btn-primary float-end">Add Credentials</a>
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
                            <th>Status</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCustomerAdmin as $key => $customer )
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
                                    <a href="{{ url('/admin/edit/'.$customer->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ url('/admin/delete/' .$customer->id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                    <a href="{{ url('/admin/print/' .$customer->id) }}" class="btn btn-success btn-sm">Print</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection