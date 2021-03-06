@extends('layouts.app')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Add account</div>
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
                <form>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Full name <span style="color: red">(*)</th>
                                <td><input type="text" name="fullName" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Username <span style="color: red">(*)</th>
                                <td><input type="text" name="username" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Email <span style="color: red">(*)</th>
                                <td><input type="email" name="email" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Password <span style="color: red">(*)</th>
                                <td><input type="password" name="password" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>
                                    @foreach($roles as $key => $role)     
                                    <label class="radio-inline" style="margin-right: 7px">
                                        <input type="radio" name="roleradio" value="{{ $role->id }}" 
                                        @if($role->roleString() == 'ROLE_USER') checked
                                        @endif >
                                        {{ $role->roleString() }}
                                    </label>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12" style="text-align: center">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection