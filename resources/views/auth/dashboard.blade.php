@extends('auth.master')


@section('title', 'dashboard')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h2>Dashboard</h2>
                </div>

                <div class="card-body">
                   <h4>welcome to dashboard</h4>

                   <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('adminlogout').submit()" >Logout</a>
                   <form action="{{ route('admin.logout') }}" id="adminlogout" class="d-none" method="post">
                     @csrf
                   </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection