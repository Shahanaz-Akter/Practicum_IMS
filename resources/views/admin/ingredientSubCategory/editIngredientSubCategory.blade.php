@extends('layouts.master')
@section('title')
<title>Edit Sub Category</title>
@endsection
@section('content')
<!--sidebar-->
@include('admin.sidebar')
<!--sidebar-->
<main class="page-content">
    <div>
        <div class="col-lg-12 ">
            <h6 class="mb-0 text-center text-uppercase">Edit Sub Category</h6>
            <div class="card">

                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="post" action="/edit_ingredient_subcategory_post" enctype="multipart/form-data">
                            @csrf                          
                            <div class="col-12">
                            </div>
                            <div class="col-6" style="display: none;">
                                <label class="form-label">ID</label>
                                <input class="form-control" value="{{ $ingredientSubCategory->id }}" name="id">
                            </div>
                            <div >
                                    <img src="{{asset($ingredientSubCategory->image)}}" alt="sub category image"  id="output" width="100">
                                </div>
                            <div class="col-12  col-lg-6">
                                <label class="form-label"><b> Image Upload</b></label>
                                <input name="image" type="file" class="form-control" placeholder="Link" onchange="loadFile(event)">

                            </div>
                            <div class="col-6">
                                <label class="form-label">Name </label>
                                <input type="text" class="form-control" value="{{ $ingredientSubCategory->name }}" name="name">
                            </div>
                            <div class="col-6">
                                <label class="form-label">description</label>
                                <input type="text" class="form-control" value="{{ $ingredientSubCategory->description }}" name="description">
                            </div>
                            
                            <div class="col-6">
                                @php 
                                $category = \App\IngredientCategory::all();
                                @endphp
                                <label class="form-label"><b>Ingredient Category</b></label>
                                <select class="single-select" name="category" value="null" required>

                                    @foreach($category as $c)
                                    <option value="{{$c->id}}" @if($c->id ===$ingredientSubCategory->ingredient_category_id) selected @endif>{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                           

                            <div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    
    var loadFile = function(event) {
        console.log(event);
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };


    </script>
</main>
@endsection