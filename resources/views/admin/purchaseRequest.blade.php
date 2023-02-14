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
        
        <div class="ms-auto">
            <div class="btn-group">
                <button onclick="hide()" type="button" class="btn btn-primary">New Purchase Request</button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card-body" style="display: none;">
        <div class="row g-3">
            <div class="col-12 col-lg-8">
                <div class="card shadow-none bg-light border">
                    <div class="card-body">
                        <form class="row g-3" action="{{ url('/submit_purchase_request') }}" method="post">
                            @csrf
                            <div class="col-12 col-lg-4">

                                @php
                                $ingredients = \App\Ingredient::all();
                                @endphp

                                <label class="form-label">Select Ingredient</label>
                                <select name='ingredient' class="form-select">
                                    @if($ingredients==null)
                                    <option value="0">nodata</option>
                                    @else
                                    <option value="null">Select</option>
                                    @foreach ($ingredients as $ingredient)
                                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endforeach
                                    @endif
                                </select>

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

    <!--end breadcrumb-->
    <div class="d-flex">
        <div class="card border shadow-none w-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><input class="form-check-input" type="checkbox"></th>


                                <th>Ingredient Name</th>
                                <th>Amount</th>
                                <th>Unit</th>
                                <th>Entry Date</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $requests = \App\PurchaseRequest::all();
                            @endphp
                            @foreach ($requests as $request)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>

                                <td>
                                    @php
                                    $ingredient_name = \App\Ingredient::where('id',$request->ingredient_id)->first()->name;
                                    @endphp


                                    {{ $ingredient_name }}
                                </td>
                                <td> {{ $request->amount }} </td>
                                <td> 
                                @php
                                    $unit_name = \App\Unit::where('id',$request->unit_id)->first()->name;
                                    @endphp
                                    
                                
                                {{ $unit_name }} </td>
                                <td> {{ $request->entry_date }} </td>
                             
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
            card_body.style.display = '';
        } else {
            card_body.style.display = 'none';
        }
    }
</script>
@endsection