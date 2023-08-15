@extends('layouts.app')
@section('contents')

        @if ($role == 'admin') 
        <main>
            @yield('admin')
        </main>
        @endif
           
        @if ($role == 'staff') 
        <main>
            @yield('staff')
        </main>
           @endif
        @if ($role == 'customer')
        <main>
            @yield('customer')
        </main>   
        @endif 
        
@endsection