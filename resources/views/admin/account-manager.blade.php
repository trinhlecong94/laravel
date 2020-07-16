@extends('layouts.app1')

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
                        <jsp:include page="../include/account-menu.jsp" />
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 3em">
            <div class="col-xs-6 col-sm-6">
                <button class="btn btn-primary" onclick="location.href = '/admin?action=add-account'">Add Account</button> </div>
            <div class="col-xs-6 col-sm-6">
                <form action="${pageContext.request.getContextPath()}/search" class="form-inline" style="float: right">
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
                    <c:forEach var="account" items="${accounts}">
                        <tr>
                            <td>${account.id}</td>
                            <td>${account.username}</td>
                            <td>${account.fullName}</td>
                            <td>${account.email}</td>
                            <td>${account.address}</td>
                            <td>${account.roleString}</td>
                            <c:if test="${account.status == 'ACTIVE'}">
                                <td style="color: blue">${account.status}</td>
                            </c:if>
                            <c:if test="${account.status != 'ACTIVE'}">
                                <td style="color: red">${account.status}</td>
                            </c:if>
                            <td><a href="{{ url('/admin/edit-account?id=${account.id}') }}> <i class=" fa fa-pencil" aria-hidden="true"></i></a></td>
                        </tr>
                    </c:forEach>

                </table>
            </div>
        </div>
        <div class="row page_nav_row">
            <div class="col">
                <div class="page_nav">
                    <ul class="d-flex flex-row align-items-start justify-content-center">
                        <c:forEach begin="1" end="${page}" varStatus="status">
                            <c:choose>
                                <c:when test="${param.page==null && status.index==1}">
                                    <li class="active"><a href="{{ url('/admin?action=account-manager&page=${status.index}')}} ">${status.index} </a> </li>
                                </c:when>
                                <c:when test="${param.page==null && status.index!=1}">
                                    <li><a href="{{ url('/admin?action=account-manager&page=${status.index}')}} ">${status.index} </a> </li>
                                </c:when>
                                <c:when test="${param.page!=null && param.page==status.index}">
                                    <li class="active"><a href="{{ url('/admin?action=account-manager&page=${status.index}')}} ">${status.index} </a> </li>
                                </c:when>
                                <c:otherwise>
                                    <li><a href="{{ url('/admin?action=account-manager&page=${status.index}')}} ">${status.index} </a> </li>
                                </c:otherwise>
                            </c:choose>
                        </c:forEach>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- profile -->
</div>
@endsection