@extends('layouts.app')

@section('content')
<div class="super_container_inner">
    <style>
        .img-thumbnail-list {
            width: 50px;
            height: 67px;
            margin-right: 10px;
        }
    </style>
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">My Order</div>
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
        <div class="row mainmain">
            <div class="col-xs-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <c:forEach var="o" items="${orders}">
                            <c:forEach var="od" items="${o.orderDetails}" varStatus="status">
                                <tr>
                                    <c:if test="${status.index == 0}">
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">${o.id}</td>
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">${o.orderDate}</td>
                                    </c:if>
                                    <td class="align-middle"><a href="{{ url('//product?id=${od.product.id') }}"><img src="${od.product.images[0].url}" class="img-thumbnail-list" />${od.product.name}</a></td>
                                    <td class="align-middle">${od.size.size}</td>
                                    <td class="align-middle">${od.quantity}</td>
                                    <td class="align-middle">${od.product.price}</td>
                                    <c:if test="${status.index == 0}">
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">${o.totalPrice}</td>
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">${o.status}</td>
                                        <td class="align-middle" rowspan="${o.orderDetails.size()}">
                                            <c:if test="${o.status == 'PENDING'}">
                                                <button onclick="cancelOrder()" class="btn"><i class="fa fa-trash"></i></button>
                                            </c:if>
                                        </td>
                                    </c:if>
                                </tr>
                            </c:forEach>
                        </c:forEach>
                        <c:if test="${fn:length(orders)==0}">
                            <tr>
                                <td colspan="9" style="text-align: center">No Order</td>
                            </tr>
                        </c:if>
                    </table>
                </div>
            </div>
        </div>
        <div class="row page_nav_row">
            <div class="col">
                <div class="page_nav">
                    <ul class="d-flex flex-row align-items-start justify-content-center">
                        <c:forEach begin="1" end="${page}" varStatus="status">
                            <c:choose>
                                <c:when test="${param.page==null && status.index==1}">
                                    <li class="active"><a href="{{ url('/account?action=myorder&page=${status.index}') }}">${status.index}</a></li>
                                </c:when>
                                <c:when test="${param.page==null && status.index!=1}">
                                    <li><a href="{{ url('/account?action=myorder&page=${status.index}') }}">${status.index}</a></li>
                                </c:when>
                                <c:when test="${param.page!=null && param.page==status.index}">
                                    <li class="active"><a href="{{ url('/account?action=myorder&page=${status.index}') }}>">${status.index}</a></li>
                                </c:when>
                                <c:otherwise>
                                    <li><a href="{{ url('/account?action=myorder&page=${status.index}') }} ">${status.index}</a></li>
                                </c:otherwise>
                            </c:choose>
                        </c:forEach>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- profile -->



</div>

<script>
    function cancelOrder(id) {
        var r = confirm("Do you want to cancel an order with id: " + id);
        if (r == true) {
            window.location.href = "order/cancel/" + id;
        }
    }
</script>
@endsection