@extends('layouts.app1')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Products -->

    <div class="products" style="margin-top: 10px">
        <div class="container">
            <div class="row" style="margin-top: 130px; margin-bottom: 15px;">
                <div class="col-xl-12 col-md-12">
                    <div class="dropdown float-right">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort by
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<c:url value="/category?id=${param.id}&sort=Latest"/>">Latest </a> <a class="dropdown-item" href="<c:url value="/category?id=${param.id}&sort=Oldest"/>">Oldest </a> <a class="dropdown-item" href="<c:url value="/category?id=${param.id}&sort=HightoLow"/>">Price: High to Low</a> <a class="dropdown-item" href="<c:url value="/category?id=${param.id}&sort=LowtoHigh"/>">Price: Low to High</a> </div> </div> </div> </div> <div class="row products_row products_container grid">

                                <c:forEach var="product" items="${products}">
                                    <!-- Product -->
                                    <div class="col-xl-4 col-md-6 grid-item new">
                                        <div class="product">
                                            <div class="product_image"><a href="<c:url value="/product?id=${product.id}"> </c:url>"> <img src="${product.images[0].url}" alt=""></div>
                                            <div class="product_content">
                                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div>
                                                            <div class="product_name"><a href="<c:url value="/product?id=${product.id}"> </c:url>">${product.name} </a> </div> <div class="product_category">In <a href="<c:url value="/category?id=${product.category.id}&page=1"> </c:url>">${product.category.name} </a> </div> </div> </div> <div class="ml-auto text-right">
                                                                        <div class="rating_r rating_r_4 home_item_rating">${product.totalFavorite} favorite</div>
                                                                        <div class="product_price text-right">$${product.price}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </c:forEach>

                        </div>
                        <div class="row page_nav_row">
                            <div class="col">
                                <div class="page_nav">
                                    <ul class="d-flex flex-row align-items-start justify-content-center">
                                        <c:forEach begin="1" end="${page}" varStatus="status">
                                            <c:choose>
                                                <c:when test="${param.page==null && status.index==1}">
                                                    <li class="active"><a href="<c:url value="/category?id=${param.id}&page=${status.index}&sort=${param.sort}"/>">${status.index} </a> </li> </c:when> <c:when test="${param.page==null && status.index!=1}">
                                                    <li><a href="<c:url value="/category?id=${param.id}&page=${status.index}&sort=${param.sort}"/>">${status.index} </a> </li> </c:when> <c:when test="${param.page!=null && param.page==status.index}">
                                                    <li class="active"><a href="<c:url value="/category?id=${param.id}&page=${status.index}&sort=${param.sort}"/>">${status.index} </a> </li> </c:when> <c:otherwise>
                                                    <li><a href="<c:url value="/category?id=${param.id}&page=${status.index}&sort=${param.sort}"/>">${status.index} </a> </li> </c:otherwise> </c:choose> </c:forEach> </ul> </div> </div> </div> </div> </div> <!-- Footer -->
                                                            <jsp:include page="./include/footer.jsp" />

                                </div>

                            </div>
                            @endsection