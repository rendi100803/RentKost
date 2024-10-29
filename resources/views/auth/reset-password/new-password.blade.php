@extends('auth.login.index')
@section('content')
    <div class="page login-page">
        <div>
            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <img src="{{ url('/assets') }}/images/brand/logo.png" class="header-brand-img" alt="">
                </div>
            </div>
            <div class="container-login100">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <form
                            action="{{ route('new-password.process', ['token' => request('token'), 'email' => request('email')]) }}"
                            method="POST" class="card shadow-none">
                            @csrf
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="login100-form-title">
                                        Create New Password
                                    </span>
                                    <p class="text-muted">Enter the New Password For You Account</p>
                                </div>
                                <div class="pt-3" id="forgot">
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input class="form-control" name="password" id="password"
                                            placeholder="Enter Your Password" type="password">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirm Password</label>
                                        <input class="form-control" name="confirm_password" id="confirm_password"
                                            placeholder="Enter Your Confirm Password" type="password">
                                    </div>
                                    <div class="submit">
                                        <button class="btn btn-primary d-grid" type="submit">Submit</button>
                                    </div>
                                    <div class="text-center mt-4">
                                        <p class="text-dark mb-0">Forgot It?<a class="text-primary ms-1"
                                                href="javascript:void(0);">Send me Back</a></p>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center my-3">
                                    <a href="" class="social-login  text-center me-4">
                                        <i class="fa fa-google"></i>
                                    </a>
                                    <a href="" class="social-login  text-center me-4">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="" class="social-login  text-center">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
@endsection
