@extends('layouts.master')

@section('content')
<!--sidebar-->
@include('admin.sidebar')
<!--sidebar-->
<!--start content-->
<main class="page-content">



    <div class="d-flex">
        <div class="card border shadow-none w-100">
            <form class="card-body" method="post" action={{url("/accept_order/".$order->id)}}>
                @csrf
                <div class="responsive-table">
                    <table id="" class="table table-striped table-bordered " style="width: 100%;">
                        <thead>
                            <tr>

                                <th>Ingredient Name</th>
                                <th>Requested Amount (g)</th>
                                <th>In Stock (g)</th>
                                <th>Batch</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $orders =json_decode($order->details,true);

                            @endphp
                            @foreach ($orders as $key => $value)
                            <tr class="col-12">

                                @php
                                $ingredient = \App\Ingredient::where('id',$key)->first();
                                @endphp
                                <td> {{ $ingredient->name }}
<input type="text" name="ingredient_ids[]" value="{{$ingredient->id}}" style="display:none;">

                                </td>
                                <td>
                                    <input type="text" name="amounts[]" value="{{$value}}" style="display:none;">
                                    {{$value}}
                                </td>

                                <td>
                                    @php
                                    $stock = \App\Stock::where('ingredient_id',$key)->where('remaining',">","0")->get();
                                    $sum = 0;
                                    foreach($stock as $s){
                                    $sum = $sum + $s->remaining;
                                    }
                                    @endphp

                                    @if($sum >= $value)
                                    <span>{{$sum}} </span>
                                    @else
                                    <span style="color: red;">{{$sum}} </span>
                                    @endif
                                </td>

                                <td style="width: 200px;">
                                    <div class="col-12 col-lg-4">
                                        @php
                                        $stocks = \App\Stock::where('ingredient_id',$key)->where('remaining',">","0")->get();
                                        @endphp

                                        @if($ingredient->batchwise_stock_management=='0')
                                        <select name='stocks[]'>
                                            @if($stocks==null)
                                            <option value="0">nodata</option>
                                            @else
                                            <option value="null">Select Batch</option>
                                            @foreach($stocks as $stock)
                                            <option value="{{ $stock->id }}">B-> {{ $stock->batch_no }}: {{$stock->remaining}}g</option>
                                            @endforeach
                                            @endif
                                            <option value="auto">Auto Calculate</option>
                                        </select>
                                        @else
                                        <select name='stocks[]'>
                                            @if($stocks==null)
                                            <option value="0">nodata</option>
                                            @else
                                            <option value="null">Select Batch</option>
                                            @foreach($stocks as $stock)
                                            <option value="{{ $stock->id }}">B-> {{ $stock->batch_no }}: {{$stock->remaining}}g [{{$stock->expire_date}}]</option>
                                            @endforeach
                                            
                                            @endif
                                            <option value="auto">Auto Calculate</option>
                                        </select>
                                        @endif
                                    </div>
                                </td>

                                <td>
                                    @if($sum >= $value)
                                    <a href={{"/admin/place_purchase_request/".$key}}><span class="btn btn-secondary">Purchase Request</span></a>
                                    @else
                                    <a href={{"/admin/place_purchase_request/".$key}}><span class="btn btn-primary">Purchase Request</span></a>
                                    @endif

                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div>
                    <a href={{"/accept/".$order->id}}><button type="submit" class="btn btn-success">Accept</button></a>

                    <a href={{"/reject/".$order->id}}><span class="btn btn-danger">Reject</span></a>
                </div>
            </form>
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