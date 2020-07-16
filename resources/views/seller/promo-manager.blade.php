@extends('layouts.app1')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Promotion manager</div>
            </div>
        </div>
        <div class="row page_nav_row">
            <div class="col">
                <div class="page_nav">
                    <ul class="d-flex flex-row align-items-start justify-content-center">
                        <c:import url="../include/account-menu.jsp"></c:import>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 3em">
            <div class="col-xs-6 col-sm-6">
                <button class="btn btn-primary" onclick="location.href = '/seller?action=add-promo'">Add promotion</button>
            </div>
            <div class="col-xs-6 col-sm-6">
                <form action="${pageContext.request.getContextPath()}/search" class="form-inline" style="float: right">
                    <div class="form-group">
                        <input type="hidden" name="action" value="searchPromotion" />
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
                        <th>Promotion ID</th>
                        <th>Name</th>
                        <th>Discount</th>
                        <th>Product ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <c:forEach var="promo" items="${promos}">
                        <tr>
                            <td class="align-middle">${promo.id}</td>
                            <td class="align-middle">${promo.name}</td>
                            <td class="align-middle">${promo.discount}</td>
                            <td class="align-middle">${promo.productListFormat}</td>
                            <td class="align-middle">${promo.startDate}</td>
                            <td class="align-middle">${promo.endDate}</td>
                            <c:if test="${promo.status =='ACTIVE'}">
                                <td class="align-middle" style="color: blue">${promo.status}</td>
                            </c:if>
                            <c:if test="${promo.status !='ACTIVE'}">
                                <td class="align-middle" style="color: red">${promo.status}</td>
                            </c:if>
                            <td class="align-middle"><a href="/seller?action=edit-promo&id=${promo.id}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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
                                    <li class="active"><a href="/seller?action=promo-manager&page=${status.index}">${status.index}</a></li>
                                </c:when>
                                <c:when test="${param.page==null && status.index!=1}">
                                    <li><a href="/seller?action=promo-manager&page=${status.index}">${status.index}</a></li>
                                </c:when>
                                <c:when test="${param.page!=null && param.page==status.index}">
                                    <li class="active"><a href="/seller?action=promo-manager&page=${status.index}">${status.index}</a></li>
                                </c:when>
                                <c:otherwise>
                                    <li><a href="/seller?action=promo-manager&page=${status.index}">${status.index}</a></li>
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