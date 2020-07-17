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
                <div class="section_title text-center">Product manager</div>
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
        <div class="row" style="margin-top: 3em">
            <div class="col-xs-6 col-sm-6">
                <button class="btn btn-primary" onclick="location.href = '/seller?action=add-product'">Add product</button> </div>
            <div class="col-xs-6 col-sm-6">
                <form action="${pageContext.request.getContextPath()}/search" class="form-inline" style="float: right">
                    <div class="form-group">
                        <input type="hidden" name="action" value="searchProductSeller" />
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
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <c:forEach var="product" items="${products}">
                        <tr>
                            <td>${product.id}</td>
                            <td><a href="/product?id=${product.id}"><img src="${product.images[0].url}" class="img-thumbnail-list" />${product.name}</a></td>
                            <td>${product.code}</td>
                            <td>${product.price}</td>
                            <c:if test="${product.status=='ACTIVE'}">
                                <td style="color: blue">${product.status}</td>
                            </c:if>
                            <c:if test="${product.status!='ACTIVE'}">
                                <td style="color: red">${product.status}</td>
                            </c:if>
                            <td><a href="/seller?action=edit-product&id=${product.id}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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
                                    <li class="active"><a href="/seller?action=product-manager&page=${status.index}">${status.index}</a></li>
                                </c:when>
                                <c:when test="${param.page==null && status.index!=1}">
                                    <li><a href="/seller?action=product-manager&page=${status.index}>">${status.index}</a></li>
                                </c:when>
                                <c:when test="${param.page!=null && param.page==status.index}">
                                    <li class="active"><a href="/seller?action=product-manager&page=${status.index}">${status.index}</a></li>
                                </c:when>
                                <c:otherwise>
                                    <li><a href="/seller?action=product-manager&page=${status.index}">>${status.index}</a></li>
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
@endsection