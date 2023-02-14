@extends('layouts.master')
@section('title')
<title>Ingredients</title>
@endsection

@include('admin.sidebar')
@section('content')
<!--start content-->
<main class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

        <div class="ms-auto">
            <div class="btn-group">
                <button onclick="hide()" type="button" class="btn btn-primary">New Ingredient</button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="card ">

        <div class="card-body" style="display: none;">
            <div class="row">
                <form class="row g-3" action="{{ url('/post_ingredient') }}" method="post">
                    @csrf
                    <div class="col-12 col-lg-4">
                        <label class="form-label">Name</label>
                        <input name='name' type="text" class="form-control" placeholder="Ingredient name" required>
                    </div>

                    <div class="col-12 col-lg-4">
                        <label class="form-label">Category</label>
                        @php
                        $categories = \App\IngredientCategory::all();
                        @endphp
                        <select name='category' class="form-select">
                            @if ($categories !== null)
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            @else
                            <option style="padding:10px;">no data</option>
                            @endif


                        </select>
                    </div>
                    <div class="col-12 col-lg-4">
                        <label class="form-label">Sub Category</label>
                        @php
                        $categories = \App\IngredientSubCategory::all();
                        @endphp
                        <select name='subcategory' class="form-select">
                            @if ($categories !== null)
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            @else
                            <option style="padding:10px;">no data</option>
                            @endif


                        </select>
                    </div>
                    <div class="col-12 col-lg-4">
                        <label class="form-label">Stock Management</label>

                        <select name='stock_management' class="form-select">
                            <option value="0">Primary</option>
                            <option value="1">Batchwise</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </form>


            </div>
            <!--end row-->
        </div>
    </div>
    <div class="d-flex">
        <div class="card border shadow-none w-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><input class="form-check-input" type="checkbox"></th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Stock Management Type</th>
                                <th>In stock(g)</th>
                                <th>Stock Entry</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $ingredients = \App\Ingredient::all();
                            @endphp
                            @foreach ($ingredients as $ingredient)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td> {{ $ingredient->name }} </td>                                                                                        
                                <td>
                                @php
                                    $category = \App\IngredientCategory::where('id',$ingredient->ingredient_category_id)->first();
                                    
                                 @endphp

                                 <p>{{$category->name}}</p>

                            </td>

                                <td>
                                    @php
                                    $subcategory = \App\IngredientSubCategory::where('id',$ingredient->ingredient_subcategory_id)->first();
                                    @endphp
                                    <p> {{$subcategory->name}}</p>
                                </td>
                                <td>@if($ingredient->batchwise_stock_management=="0")Primary

                                    @else
                                    Batchwise
                                    @endif
                                </td>

                                <td>
                                    @php
                                    $stock = \App\Stock::where('ingredient_id',$ingredient->id)->where('remaining',">","0")->get();
                                    $sum = 0;
                                    foreach($stock as $s){
                                    $sum = $sum + $s->remaining;
                                    }
                                    @endphp
                                    {{$sum}}
                                </td>


                                <td><a href="{{ url('/stock_entry/' . $ingredient->id) }}">Stock Entry</a></td>

                              
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!--end page main-->
<script>
    const hide = () => {

        let card_body = document.querySelector('.card-body');

        if (card_body.style.display == 'none') {
            card_body.style.display = 'block';
        } else {
            card_body.style.display = 'none';
        }
    }
</script>
@endsection