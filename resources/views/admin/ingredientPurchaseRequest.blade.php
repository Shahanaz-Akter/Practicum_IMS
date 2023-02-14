@extends('layouts.master')
@section('title')
<title>Purchase Stock </title>
@endsection
@section('content')

@include('admin.sidebar')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="">
            <div class="btn-group">
                <button type="button" class="btn btn-danger">Purchase Request Entry</button>
            </div>
        </div>
   
    </div>
    <!--end breadcrumb-->
    <div class="card-body" >
        <div class="row g-3">
            <div class="col-12 col-lg-12">
                <div class="card shadow-none bg-light border">
                    <div class="card-body">
                        <form class="row g-3" action="{{ url('/submit_purchase_request') }}" method="post">
                            @csrf
                            <div class="col-12 col-lg-4">

                            <label class="form-label">Ingredient Name</label>
                                <input  type="text" class="form-control" value="{{$ingredient->name}}" disabled>
                                <input style="display: none;" name="ingredient" type="text" class="form-control" value="{{$ingredient->id}}" required>

                            </div>
                            <div class="col-12 col-lg-4">
                                <label class="form-label">Total Amount</label>
                                <input name="amount" type="text" class="form-control" placeholder="amount" required>
                            </div>
                            <div class="col-12 col-lg-4">
                                    @php
                                    $units = \App\Unit::all();

                                    @endphp
                                    <label class="form-label">Ingredient Unit</label>
                                    <select class="single-select" name="unit" id="" required>
                                        @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                          


                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>

 
</main>
<!--end page main-->
<script>
   
</script>
@endsection