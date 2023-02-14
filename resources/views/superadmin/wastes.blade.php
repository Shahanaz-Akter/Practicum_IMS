@extends('layouts.master')

@section('content')
<!--sidebar-->
@include('superadmin.sidebar')
<!--sidebar-->
<!--start content-->
<main class="page-content">


    <div>
        <h2 class="text-center text-success">View All Waste List</h2>
        <hr>
        <br>
    </div>
    <div class="d-flex">
        <div class="card bwaste shadow-none w-100">
            <div class="card-body">
                <div class="responsive-table">
                    <table id="" class="table table-striped table-bwasteed " style="width: 100%;table-layout:fixed;">
                        <thead>
                            <tr>

                                <th>Waste ID</th>
                                <th>Ingredient Name</th>

                                <th>Amount (g)</th>
                                <th>Cost</th>
                                <th>Expired At</th>
                               

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $wastes = \App\Waste::orderBy('id','desc')->get();

                            @endphp
                            @foreach ($wastes as $waste)
                            <tr class="col-12">


                                <td> {{ $waste->id }} </td>
                                @php 
                                $ingredient = \App\Ingredient::where('id',$waste->ingredient_id)->first();
                                @endphp
                                <td> {{ $ingredient->name }} </td>
                                <td> {{ $waste->amount }} </td>
                                <td> {{ $waste->cost }} </td>
                                
                                <td>{{$waste->expire_date}}</td>

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