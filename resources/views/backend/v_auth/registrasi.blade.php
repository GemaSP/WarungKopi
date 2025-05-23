@extends('backend.v_auth_layouts.app')
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form action="{{ route('backend.storeregistrasi') }}" method="post" class="user">
                        @csrf
                        <div class="form-group">
                            <input name="nama" type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" id="nama"
                                placeholder="First Name">
                            @error('nama')
                            <small>
                                <div class="text-danger" role="alert">{{ $message }}</div>
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                                placeholder="Email Address">
                            @error('email')
                            <small>
                                <div class="text-danger" role="alert">{{ $message }}</div>
                            </small>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="exampleInputPassword" placeholder="Password">
                                @error('password')
                                <small>
                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                </small>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                                @error('password')
                                <small>
                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </button>
                        <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{ route('backend.login') }}">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection