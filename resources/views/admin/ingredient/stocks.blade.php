@extends('layouts.master')
@section('title')
<title>Stock</title>
@endsection
@include('admin.sidebar')
@section('content')

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="">
            <div class="btn-group">
                <button type="button" class="btn btn-danger"><b>{{$ingredient->name}} Stock</b> </button>
            </div>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button onclick="hide()" type="button" class="btn btn-primary">New Stock</button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card-body" style="display: none;">
        <div class="row g-3">
            <div class="col-12 col-lg-12">
                <div class="card shadow-none bg-light border">
                    <div class="card-body">
                        <form class="row g-3" action="{{ url('/submit_stock/' . $ingredient->id) }}" method="post">
                            @csrf
                            <div class="col-12 col-lg-4">
                                <label class="form-label">Total Amount</label>
                                <input name="amount" type="text" class="form-control" placeholder="amount" required>
                            </div>

                            <div class="col-12 col-lg-4">
                                @php
                                $units = \App\Unit::all();
                                @endphp
                                <label class="form-label">Unit</label>
                                <select name='unit_id' class="form-select">
                                    @if($units==null)
                                    <option value="0">nodata</option>
                                    @else
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-12 col-lg-4">
                                <label class="form-label">Total Cost</label>
                                <input type="text" name="total_cost" class="form-control" placeholder="Cost" required>
                            </div>

                            @if($ingredient->batchwise_stock_management=='1')
                            <div class="col-12 col-lg-4">
                                <label class="form-label">Manufacture Date</label>
                                <input name="manufacture_date" type="date" class="form-control" placeholder="Manufacture Date" max={{Carbon\Carbon::now()->format('d-m-y')}} required>
                            </div>
                            @endif

                            @if($ingredient->batchwise_stock_management=='1')
                            <div class="col-12 col-lg-4">
                                <label class="form-label">Expire Date</label>
                                <input name="expire_date" type="date" class="form-control" placeholder="Expire Date" min={{Carbon\Carbon::now()->format('d-m-y')}} required>
                            </div>
                            @endif

                            <div class="col-12 col-lg-4">
                                <label class="form-label">Alert Quantity(g)</label>
                                <input name='alert_qty' type="text" class="form-control" placeholder="Alert Quantity" required>
                            </div>

                            <div class="col-12 col-lg-4">
                                @php
                                  $time = Carbon\Carbon::now()->timestamp;
                                @endphp
                                <label class="form-label">Batch No</label>
                                <input name='batch_no' type="text" class="form-control" placeholder="Batch No" value="{{$time}}" required>
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
                                <th>Total Amount(g)</th>
                                <th>Remaining(g)</th>
                                <th>Cost Per Unit(TK)</th>
                                <th>Entry Date</th>
                                @if($ingredient->batchwise_stock_management)
                                <th>Expire date</th>
                                @endif
                                <th>Batch No</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $stocks = \App\Stock::where('ingredient_id',$ingredient->id)->get();
                            @endphp
                            @foreach ($stocks as $stock)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td> {{ $stock->amount }} </td>
                                <td> {{ $stock->remaining }} </td>
                                <td>{{ $stock->cost_per_unit }} </td>
                                <td>{{ $stock->entry_date }}</td>
                                @if($ingredient->batchwise_stock_management)
                                <td>{{ $stock->expire_date }}</td>
                                @endif
                                <td>{{$stock->batch_no}}</td>
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