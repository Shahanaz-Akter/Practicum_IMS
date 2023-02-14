@extends('layouts.master')

<!-- start title -->
@section('title')
<title>User-List</title>
@sendection
<!-- end title -->

<!--sidebar-->
@include('superadmin.sidebar')
<!--sidebar-->

@section('content')
<!--start content-->
<main class="page-content">
    <div class="d-flex">
        <div class="card border shadow-none w-100">
            <div class="card-body">
                <div class="responsive-table">
                    <table id="example2" class="table table-striped table-bordered " style="width: 100%;table-layout:fixed;">
                        <thead>
                            <tr>
                                
                                <th >Image</th>
                                <th >Email</th>
                                <th >Password</th>
                                <th >Phone</th>
                                <th >Gender</th>
                                <th >Address</th>
                                <th >Position</th>                          
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="col-12">

                              
                                <td style="text-align: center;"><img height="150" src="{{ $user->image }}" alt=""> <br> {{ $user->name }}</td>
                                <td > {{ $user->email }}</td>
                                <td style="color: blue; font-weight:bold;"> {{ $user->password }}</td>
                                <td>{{ $user->phone }} </td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->address}}</td>
                                <td style="color: black; font-weight:bold;">{{$user->user_type}}</td>                            
                                <td>                                  
                                    <a href="{{url('/edituser/'.$user->id)}}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i>
                                    </a>
                                </td>
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