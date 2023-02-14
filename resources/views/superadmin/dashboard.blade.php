@extends('layouts.master')
<!-- title start-->
@section('title')
<title>SuperAdmin Dashboard</title>
@endsection
<!-- end title start-->

<!--start wrapper-->
<!-- <div class="wrapper"> -->

<!-- @include('layouts.header') -->

<!--start sidebar-->
@include('superadmin.sidebar')
<!--end sidebar-->

@section('content')
<!-- start main -->
@include('superadmin.dailyreport')
<!-- end main -->

@endsection

<!--end wrapper-->
<!-- </div> -->