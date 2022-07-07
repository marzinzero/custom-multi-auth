@extends('auth.master')


@section('title', 'password reset')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h2>Password Reset</h2>
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

                    <form action="{{ route('admin.reset.password') }}" method="POST">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}" />

                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" value="{{ $email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" />
                          @error('email')
                              <strong class="text-danger">{{ $message }}</strong>
                          @enderror                            
                        </div> 
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="email" />
                            @error('password')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror                            
                          </div>

                          <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="email" />
                            @error('password_confirmation')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror                            
                          </div> 
  
              
                       <button type="submit" class="btn btn-primary">Reset Password</button>            
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection