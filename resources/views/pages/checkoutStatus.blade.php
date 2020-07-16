@extends('layouts.app1')

@section('content')
<div class="container" style="text-align: center;margin-top: 150px;margin-bottom: 300px;">
    <h1 style="color: blue">${messageSuccess}</h1>
    <h1 style="color: red">${messageError}</h1>
    <c:if test="${messageSuccess != null}">
        <a href="<c:url value="/order-detail?id=${id}&email=${email}"> </c:url>">Click here to view order status</a> </c:if> </div> </div>
        @endsection