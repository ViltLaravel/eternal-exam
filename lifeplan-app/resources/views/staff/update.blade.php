@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>Hey!</strong> {{ $error }}</li>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Hey!</strong>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>   
            </div>
        @endif 
        <div class="card" style="background-color: #D0BFFF">
            <div class="card-headder" style="background-color: #445069; padding-top: 8px; padding-right: 5px; padding-bottom: 10px; color: white; padding-left: 20px">
                <h4>
                    Update Customer's Credentials
                    <a href="/home" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ url('staff/update/' .$edit->id) }}" method="POST">
                    @csrf
                    <div class="col-md-4">
                      <label for="last_name" class="form-label">Last Name</label>
                      <input type="text" class="form-control"  name="last_name" value="{{ $edit->last_name }}" disabled>
                    </div>
                    <div class="col-md-4">
                      <label for="first_name" class="form-label">First Name</label>
                      <input type="text" class="form-control"  name="first_name" value="{{ $edit->first_name }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" value="{{ $edit->middle_name }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $edit->address }}">
                    </div>
                    <div class="col-md-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date" class="form-control" name="birthday" value="{{ $edit->birthday }}" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="sex" class="form-label">Sex</label>
                        <select name="sex"  class="form-control" disabled>
                            <option selected>{{ $edit->sex }}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="civil_status" class="form-label">Civil Status</label>
                        <select name="civil_status" class="form-control" disabled>
                            <option selected>{{ $edit->civil_status }}</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Divorce">Divorce</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" name="contact_number" value="{{ $edit->contact_number }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="product" class="form-label">Plan</label>
                        <select name="product" class="form-control">
                            <option selected>{{ $edit->product }}</option>
                            <option value="Life Plan">Life Plan</option>
                            <option value="Education Plan">Education Plan</option>
                            <option value="Pension Plan">Pension Plan</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $edit->email }}" disabled>
                    </div>
                    <div class="col-md-7">
                        <label for="price" class="form-label">Price<i style="font-size: .9em; font-style:italic; color:red">( Life Plan – 30,000.00 to 60,000.00 | Education – 50,000.00 to 150,000.00 | Pension – 30,000.00 to 100,000.00 )</i></label>
                        <input type="number" class="form-control" name="price" value="{{ $edit->price }}">
                    </div>
                    <div class="col-md-3">
                        <label for="payment" class="form-label">Payment</label>
                        <input type="number" class="form-control" name="payment" value="{{ $edit->payment }}">
                    </div>
                    <div class="col-md-2">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control" disabled>
                            <option selected>{{ $edit->role }}</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="customer">Customer</option>
                        </select>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection