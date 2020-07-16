@extends('layouts.app1')

@section('content')
<div class="container" style="text-align: center;margin-top: 150px;margin-bottom: 300px;">

    <h2 style="color: blue">${messageSuccess}</h2>
    <a href="<c:url value="/home"> </c:url>">Click here to return home page</a> </div> </div>
    @endsection