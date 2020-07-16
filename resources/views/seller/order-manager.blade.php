@extends('layouts.app1')

@section('content')
<div class="super_container">

    <!-- Header -->
    <jsp:include page="../include/header.jsp" />

    <div class="super_container_inner">
        <div class="super_overlay"></div>
        <div class="container">
            <div class="row" style="margin-top: 100px">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section_title text-center">Order manager</div>
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
                    <a href="{{ url('/downloadOrderExcel')}}"><i class="fa fa-download" aria-hidden="true"></i> Export to Excel</a>
                </div>
                <div class="col-xs-6 col-sm-6">
                    <form action="${pageContext.request.getContextPath()}/search" class="form-inline" style="float: right">
                        <div class="form-group">
                            <input type="hidden" name="action" value="searchOrderSeller" />
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
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <c:forEach var="o" items="${orders}">
                            <c:forEach var="od" items="${o.orderDetails}" varStatus="status">
                                <tr>
                                    <c:if test="${status.index == 0}">
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">${o.id}</td>
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">${o.orderDate}</td>
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">${o.account.username}</td>
                                    </c:if>
                                    <td class="align-middle"><a href="{{url('/product?id=${od.product.id}')}}">${od.product.name}</a></td>
                                    <td class="align-middle">${od.size.size}</td>
                                    <td class="align-middle">${od.quantity}</td>
                                    <td class="align-middle">${od.product.price}</td>
                                    <c:if test="${status.index == 0}">
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">${o.totalPrice}</td>
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">${o.status}</td>
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">
                                            <button onclick="window.location.href = 'seller?action=update-order&id=' + {oid};" class="btn"><i class="fa fa-pencil-square-o"></i></button>
                                        </td>
                                    </c:if>
                                </tr>
                            </c:forEach>

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
                                        <li class="active"><a href="{{url('/seller?action=order-manager&page=')}}">${status.index} </a> </li>
                                    </c:when>
                                    <c:when test="${param.page==null && status.index!=1}">
                                        <li><a href="{{url('/seller?action=order-manager&page=')}}">">${status.index} </a> </li>
                                    </c:when>
                                    <c:when test="${param.page!=null && param.page==status.index}">
                                        <li class="active"><a href="{{url('/seller?action=order-manager&page=')}}">">${status.index} </a> </li>
                                    </c:when>
                                    <c:otherwise>
                                        <li><a href="{{url('/seller?action=order-manager&page=')}}">${status.index} </a> </li>
                                    </c:otherwise>
                                </c:choose>
                            </c:forEach>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection