@extends('layouts.master')
@section('title')
<title>Add Ingredient Sub Category</title>
@endsection
@section('content')
@include('admin.sidebar')
<!--start content-->
<main class="page-content">


    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Ingredient SubCategory</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <form class="col-12 col-lg-4 d-flex" method="post" action="{{ url('/post_ingredient_subcategory') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row">
                                <div class="col-12 mb-2">
                                    <label class="form-label">Name</label>
                                    <input name='name' type="text" class="form-control" placeholder="Category name" required>
                                </div>

                                <div class="col-12 mb-2">
                                    @php
                                    $categ = \App\IngredientCategory::all();
                                    @endphp
                                    <label class="form-label">Ingredient Category</label>
                                    <select class="single-select" name="category" id="" required>
                                        @foreach($categ as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <img src="https://cpworldgroup.com/wp-content/uploads/2021/01/placeholder.png" id="output" style="height: 100px; width:auto;" />
                                <div class="col-12 mb-2">

                                    <label class="form-label">Image Upload</label>
                                    <input name="image" type="file" class="form-control" placeholder="Link" onchange="loadFile(event)">

                                </div>


                                <div class="col-12">
                                    <label class="form-label">Description [within 500 characters]</label>
                                    <textarea style="height: 150px;" name='description' class="form-control" rows="3" cols="3" placeholder="Category Description" required></textarea>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Add Ingredient SubCategory</button>
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($ingredientSubCategories !== null)
                                        @foreach ($ingredientSubCategories as $category)
                                        <tr>
                                            <td style="width: 5%;" class="col-12"><input class="form-check-input" type="checkbox">
                                            </td>
                                            <td style="text-align: center; width: 15%;"><img height="60" src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                                            </td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                {{ $category->description }}
                                            </td>
                                            @php
                                               $ingredientcategory = \App\IngredientCategory::where('id',$category->ingredient_category_id)->first();
                                            @endphp
                                            <td>
                                                {{$ingredientcategory->name}}
                                            </td>
                                            <td>
                                                <a href="{{url('/edit_ingredient_subcategory/'.$category->id)}}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>


                                                <a href="{{url('/delete_ingredient_subcategory/'.$category->id)}}">
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