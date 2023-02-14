@extends('layouts.master')
@section('title')
<title>Add and view Ingredient Category</title>
@endsection
@section('content')
@include('admin.sidebar')
<!--start content-->
<main class="page-content">

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Ingredient Category</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <form class="col-12 col-lg-4 d-flex" method="post" action="{{ url('/post_ingredient_category') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row">
                                <div class="col-12 mb-2">
                                    <label class="form-label">Ingredient Category Name</label>
                                    <input name='name' type="text" class="form-control" placeholder="Category name" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description [within 500 characters]</label>
                                    <textarea style="height: 150px;" name='description' class="form-control" rows="3" cols="3" placeholder="Category Description" required></textarea>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Add Ingredient Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
                <div class="col-12 col-lg-8 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <div class="">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input class="form-check-input" type="checkbox"></th>

                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($ingredientCategories !== null)
                                        @foreach ($ingredientCategories as $category)
                                        <tr>
                                            <td style="width: 5%;" class="col-12"><input class="form-check-input" type="checkbox">
                                            </td>

                                            <td style="width: 20%;">{{ $category->name }}</td>
                                            <td style="width: 40%;  word-wrap: break-word;">
                                                {{ $category->description }}
                                            </td>

                                            <td style="width: 20%;">
                                               

                                                <a href="{{url('/edit_ingredient_category/'.$category->id)}}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>


                                                <a href="{{url('/delete_ingredient_category/'.$category->id)}}">
                                                    <svg style="color: red; font-size: 2px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </a>
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
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection