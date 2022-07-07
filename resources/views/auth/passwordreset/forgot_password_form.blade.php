@extends('auth.master')


@section('title', 'password reset link')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h2>Password Reset Link</h2>
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

                    <form action="{{ route('admin.forgot.password') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                          <label for="email" class="form-label">User name</label>
                          <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" />
                          @error('email')
                              <strong class="text-danger">{{ $message }}</strong>
                          @enderror                            
                        </div>                        
  
              
                     <button type="submit" class="btn btn-primary">Login</button>
            
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection