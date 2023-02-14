@extends('layouts.master')
@section('content')
@section('title')
<title>Unit</title>
@endsection
@include('admin.sidebar')
<!--start content-->
<main class="page-content">

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Ingredient Unit</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <form class="col-12 col-lg-4 d-flex" method="post" action="{{ url('/create_ingredient_unit') }}">
                    @csrf
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Full Name</label>
                                    <input name='name' type="text" class="form-control" placeholder="Unit name" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Short Name</label>
                                    <input name='short_name' type="text" class="form-control" placeholder="Short name" required>
                                </div>
                                <br>
                                <div class="col-12">
                                    <label class="form-label">In Gram</label>
                                    <input name='gram' type="text" class="form-control" placeholder="in gram" required>
                                </div>
                                <br>
                                <div class="col-12 ">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Add Ingredient Unit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
                <div class="col-12 col-lg-8 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input class="form-check-input" type="checkbox"></th>

                                            <th>Name</th>
                                            <th>Short Name</th>
                                            <th>In gram</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($ingredient_units !== null)
                                        @foreach ($ingredient_units as $unit)
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox"></td>
                                            <td>{{ $unit->name }}</td>
                                            <td>{{ $unit->short_name }}</td>
                                            <td>{{$unit->in_gram}}</td>
                                     
                                            <td>
                                                <a href="{{url('/editunit/'.$unit->id)}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>

                                                <a href="{{url('/deleteunit/'.$unit->id)}}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif


                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>

</main>
<!--end page main-->
@endsection