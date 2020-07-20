@extends('layouts.app')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Edit account</div>
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
                <form method="POST" action="{{{ url('/admin/update-account') }}}">
                    @csrf
                    <input type="hidden" name="userId" value="{{$account->id}}">
                    
                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input readonly="readonly" id="username" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{$account->username}}" required autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$account->email}}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>
                        <div class="col-md-6">
                            <input id="phone" type="tel" pattern="^0[0-9]{9}$" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$account->phone}}" required autocomplete="phone">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="full_name" class="col-md-4 col-form-label text-md-right">{{ __('Full name') }}</label>
                        <div class="col-md-6">
                            <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{$account->full_name}}" required autocomplete="full_name">
                            @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>
                        <div class="col-md-6">
                            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{$account->birthday}}" required autocomplete="birthday">
                            @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$account->address}}" required autocomplete="address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                        <div class="col-md-6">
                            <input type="checkbox" id="ROLE_USER" name="role[0]" value="ROLE_USER" @foreach($account->roles as $key=>$role)
                            @if($role->roleString()=="ROLE_USER") checked @endif @endforeach>
                            <label for="ROLE_USER"> ROLE_USER</label><br>
                            <input type="checkbox" id="ROLE_SELLER" name="role[1]" value="ROLE_SELLER" @foreach($account->roles as $key=>$role)
                            @if($role->roleString()=="ROLE_SELLER") checked @endif @endforeach>
                            <label for="ROLE_SELLER"> ROLE_SELLER</label><br>
                            <input type="checkbox" id="ROLE_ADMIN" name="role[2]" value="ROLE_ADMIN" @foreach($account->roles as $key=>$role)
                            @if($role->roleString()=="ROLE_ADMIN") checked @endif @endforeach>
                            <label for="ROLE_ADMIN"> ROLE_ADMIN</label><br><br>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                        <div class="col-md-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" value="ACTIVE" @if($account->status=='ACTIVE') checked @endif >ACTIVE
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" value="INACTIVE" @if($account->status!='ACTIVE') checked @endif>INACTIVE
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-6">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection