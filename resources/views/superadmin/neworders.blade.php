@extends('layouts.master')
@section('title')
<title>New Orders</title>
@endsection
<!--sidebar-->
@include('superadmin.sidebar')
<!--sidebar-->
@section('content')

<!--start content-->
<main class="page-content">


<div>
    <h3 class="text-center text-success">New Orders</h3>
</div>
    <div class="d-flex">
        <div class="card border shadow-none w-100">
            <div class="card-body">
                <div class="responsive-table">
                    <table id="" class="table table-striped table-bordered " style="width: 100%;table-layout:fixed;">
                        <thead>
                            <tr>

                                <th>Order ID</th>
                                <th>Details</th>
                              
                                <th>Placed Date</th>
                                <th>Kitchener</th>  
                                <!-- <th>Status</th> -->

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $orders = \App\Order::where('status','pending')->orderBy('id', 'desc')->get();
                          
                            @endphp
                            @foreach ($orders as $order)
                            <tr class="col-12">


                                <td> {{ $order->id }} </td>
                                @php
                                $details = json_decode($order->details,true);
                                
                                @endphp
                                <td> 
                                    @foreach($details as $key => $value)
                                    @php 
                                    $ingredientname = \App\Ingredient::where('id',$key)->first()->name;
                                    
                                    @endphp
                                   
                                    <b>{{$ingredientname}}</b> : <span>{{$value}} Gram</span>
                                    <br>
                                    @endforeach
                            </td>
                               

                                <td>{{ $order->placed_date }} </td>
                                @php
                                $user = \App\user::where('id',$order->kitchener_id)->first();
                                @endphp
                                <td>{{ $user->name }} </td>

                                <!-- <td >
                                    <a href={{"/superadmin/check/".$order->id}}><span class="btn btn-primary">Check</span></a>
                                                                
                                </td> -->
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