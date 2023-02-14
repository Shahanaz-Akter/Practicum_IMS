<!-- Daily report page -->

@extends('layouts.master')
@section('title')
<title>Daily Report</title>
@endsection
@include('superadmin.sidebar')
@section('content')

<main class="page-content">
    <h4 class="text-center  btn-primary">Monthly Order Accepted Report</h4>


    <div class="d-flex">
        <div class="card border shadow-none w-100">
            <div class="card-body">
                <div class="table-responsive">

                <!-- Search button  -->
                       
                

                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr style="display:none;">
                                <th>Details</th>
                                <th>Placed Date</th>
                                <th>Kitchener Name</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $orders = \App\Order::orderBy('id', 'desc')->get();
                            @endphp
                            @foreach ($orders as $order)
                            @if(Carbon\carbon::now()->format('d-m-y') && $order->status==='accepted')
                            <tr class="col-12">
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
                                <td>

                                    <span class="btn btn-success">{{ $order->status }}</span>
                                </td>

                            </tr>
                            @endif
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

<!--end row-->

<!--end page main-->