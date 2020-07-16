@extends('layouts.app1')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Update order</div>
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
                <p style="font-size: 150%;color: red;text-align: center">${messageError}</p>
                <p style="font-size: 150%;color: blue;text-align: center">${messageSuccess}</p>
                <form action="${pageContext.request.getContextPath()}/seller/update-order" method="post" class="form-horizontal">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Order ID</th>
                                <td>${orderSaved.id}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>${orderSaved.account.username}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>${orderSaved.orderDate}</td>
                            </tr>
                            <tr>
                                <th>Product</th>
                                <td>${orderSaved.productsFormat}</td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <td>
                                    <p>Full name: ${orderSaved.shipping.fullName}</p>
                                    <p>Phone: ${orderSaved.shipping.phone}</p>
                                    <p>Address: ${orderSaved.shipping.address}</p>
                                    <p>Email: ${orderSaved.shipping.email}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <select name="status" class="form-control">
                                        <c:forEach var="s" items="${status}">
                                            <option value="${s}" <c:if test="${s == orderSaved.status}">selected</c:if>>${s}</option>
                                        </c:forEach>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <input type="hidden" name="id" value="${orderSaved.id}" />
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12" style="text-align: center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection