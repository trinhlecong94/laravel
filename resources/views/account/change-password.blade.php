@extends('layouts.app')
@section('content')
    <div class="super_container_inner">
        <div class="super_overlay"></div>
        <div class="container">
            <div class="row" style="margin-top: 100px">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section_title text-center">Change Password</div>
                </div>
            </div>
            <div class="row page_nav_row">
                <div class="col">
                    <div class="page_nav">
                        <ul class="d-flex flex-row align-items-start justify-content-center">
                            @include('layouts.account-menu')
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mainmain">
                <div class="col-xs-12 col-sm-12">
                    <div class="card-body">
                        <form method="POST" action="{{ url('account/update-password') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="oldPassword"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
                                <div class="col-md-6">
                                    <input id="oldPassword" type="password"
                                           class="form-control @error('oldPassword') is-invalid @enderror"
                                           name="oldPassword" autocomplete="oldPassword">
                                    @error('oldPassword')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
