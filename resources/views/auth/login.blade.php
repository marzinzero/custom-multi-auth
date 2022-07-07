@extends('auth.master')


@section('title', 'login')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h2>Login</h2>
                </div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                  @endif
                  
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                          <label for="email" class="form-label">User name</label>
                          <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" />
                          @error('email')
                              <strong class="text-danger">{{ $message }}</strong>
                          @enderror                            
                        </div>

                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" />
                          @error('email')
                          <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                        </div>

                        <div class="mb-3 form-check">
                          <input type="checkbox" name="remember" class="form-check-input" id="remember" />
                          <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                      
  
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="{{ route('admin.forgot.password.form') }}" class="float-right">Forgot password</a>
                       </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection