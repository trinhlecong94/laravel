@extends('layouts.app')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Account manager</div>
            </div>
        </div>
        <div class="row page_nav_row">
            <div class="col">
                <div class="page_nav">
                    <ul class="d-flex flex-row align-items-start justify-content-center">
                        @include('layouts.account-menu')
                        <jsp:include page="../include/account-menu.jsp" />
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 3em">
            <div class="col-xs-6 col-sm-6">
                <button class="btn btn-primary" onclick="location.href = '/admin/add-account'">Add Account</button> </div>
            <div class="col-xs-6 col-sm-6">

                <form action="{{url('/search')}}" class="form-inline" style="float: right">
                    <div class="form-group">
                        <input type="hidden" name="action" value="searchAccount" />
                        <input type="text" name="searchText" class="form-control" />
                        <button type="submit" class="btn btn-primary" style="margin-left: 5px">Search</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="row mainmain">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($accounts as $key => $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->username }}</td>
                        <td>{{ $account->full_name }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->full_name }}</td>
                        <td>
                            @foreach($account->roles as $key => $role)
                            {{ $role->roleString() }}
                            <br>
                            @endforeach
                        </td>
                        @if($account->status=='ACTIVE')
                        <td style="color: blue">{{ $account->statusToString() }}</td>
                        @else
                        <td style="color: red">{{ $account->statusToString() }}</td>
                        @endif
                        <td>
                            <a href="/admin/view-account/{{ $account->id}}">
                                <i class=" fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row page_nav_row">
            <div class="col">
                <div class="page_nav">
                    <ul class="d-flex flex-row align-items-start justify-content-center">
                        {{ $accounts->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- profile -->
</div>
@endsection