@extends('layouts.master')
@section('title')
<title>Update Unit</title>
@endsection
@include('admin.sidebar')
@section('content')

<!--start content-->
<main class="page-content">

<div class="card-body">
    <div class="row g-3">
        <div class="col-12 col-lg-8">
            <div class="card shadow-none bg-light border">
                <div class="card-body">
                    <form class="row g-3" action="{{url('/punit/'.$edit->id)}}" method='post'>
                        @csrf
                        
                        <div class="col-12 col-lg-6">
                            <label class="form-label">Unit_Id</label>
                            <input type="text" class="form-control" name="id" value="{{$edit->id}}">
                        </div>

                        <div class="col-12 col-lg-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="full_name" value="{{$edit->name}}">
                            <!-- or                               
                                <input type="file" class="form-control" name="img"> -->
                        </div>

                        <div class="col-12 col-lg-6">
                            <label class="form-label">In Gram</label>
                            <input type="text" class="form-control" name="in_gram" value="{{$edit->in_gram}}">
                            <!-- or <input type="file" class="form-control" name="img"> -->
                        </div>

                        <div class="col-12 col-lg-6">
                            <label class="form-label">Short Name </label>
                            <input type="text" name="short_name" class="form-control" value="{{$edit->short_name}}">
                        </div>
                       
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-4">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>

</main>
@endsection