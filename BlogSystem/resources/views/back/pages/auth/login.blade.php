@extends('back.layout.auth_layout')
@section('pagetitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')



    {{-- Page Content Here......   --}}
    
    
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Login</h2>
        </div>
        <form action="{{ route('admin.login_handler') }}" method="POST">
            <x-form-alerts></x-form-alerts>
            @csrf


            @error('login_id')
                <span class="text-danger ml-1">{{ $message }}</span>
            @enderror


            <div class="input-group custom">
                <input type="text" name="login_id" class="form-control form-control-lg" placeholder="UsernameOR@email" value="{{ old('login-id') }}"/>
                <div class="input-group-append custom">
                    <span class="input-group-text"
                        ><i class="icon-copy dw dw-user1"></i
                    ></span>
                </div>
            </div>

            

            @error('password')
                <span class="text-danger ml-1">{{ $message }}</span>
            @enderror



            <div class="input-group custom">
                <input type="password" name="password" class="form-control form-control-lg" placeholder="**********" value="{{ old('password') }}"/>
                <div class="input-group-append custom">
                    <span class="input-group-text">
                        <i class="dw dw-padlock1">
                        </i>
                    </span>
                </div>
            </div>

            

            <div class="row pb-30">
                <div class="col-6">
                    <div class="custom-control custom-checkbox">
                        <input
                            type="checkbox"
                            class="custom-control-input"
                            id="customCheck1"
                        />
                        <label class="custom-control-label" for="customCheck1"
                            >Remember</label
                        >
                    </div>
                </div>
                <div class="col-6">
                    <div class="forgot-password">
                        <a href="forgot-password.html">Forgot Password</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                   
                        {{-- <a class="btn btn-primary btn-lg btn-block">Sign In</a> --}}
                    </div>
                    {{-- <div
                        class="font-16 weight-600 pt-10 pb-10 text-center"
                        data-color="#707373"
                    >
                        OR
                    </div> --}}
                    {{-- <div class="input-group mb-0">
                        <a
                            class="btn btn-outline-primary btn-lg btn-block"
                            href="register.html"
                            >Register To Create Account</a
                        >
                    </div> --}}
                </div>
            </div>
        </form>
    </div>
					
    
@endsection