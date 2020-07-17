@extends('layouts.app')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Edit promotion</div>
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
                <p style="font-size: 150%;color: red;text-align: center">${param.messageError}</p>
                <p style="font-size: 150%;color: blue;text-align: center">${param.messageSuccess}</p>
                <f:form action="${pageContext.request.getContextPath()}/seller/edit-promo" method="post" modelAttribute="promotion" class="form-horizontal">
                    <input type="hidden" name="id" value="${promotion.id}" />
                    <div class="table-responsive">
                        <table class="table table-bordered" style="color: #000">
                            <tr>
                                <th>Name <span style="color: red">(*)</span></th>
                                <td><input type="text" name="name" value="${promotion.name}" class="form-control" readonly /></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><input type="text" name="description" value="${promotion.description}" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Start date <span style="color: red">(*)</span></th>
                                <td><input type="date" name="startDate" value="${promotion.startDate}" class="form-control" required /></td>
                            </tr>

                            <tr>
                                <th>End date <span style="color: red">(*)</span></th>
                                <td><input type="date" name="endDate" value="${promotion.endDate}" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Discount <span style="color: red">(*)</span></th>
                                <td><input type="number" name="discount" value="${promotion.discount}" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Apply for products <span style="color: red">(*)</span></th>
                                <td>
                                    <c:forEach var="p" items="${products}" varStatus="status">
                                        <div class="checkbox">
                                            <c:choose>
                                                <c:when test="${productsBoolean[status.index]}">
                                                    <label><input type="checkbox" name="product" value="${p.id}" checked>ID: ${p.id} ${p.name}</label>
                                                </c:when>
                                                <c:otherwise>
                                                    <label><input type="checkbox" name="product" value="${p.id}">ID: ${p.id} ${p.name}</label>
                                                </c:otherwise>
                                            </c:choose>
                                        </div>
                                    </c:forEach>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <c:forEach items="${status}" var="s">
                                        <label class="radio-inline" style="margin-right: 7px">
                                            <input type="radio" name="statusradio" value="${s}" <c:if test="${promotion.status==s}">checked</c:if>>${s}
                                        </label>
                                    </c:forEach>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12" style="text-align: center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </f:form>
            </div>
        </div>

    </div>
</div>

@endsection