@extends('layouts.master')
@section('title')
<title>Profile</title>
@endsection
@section('content')
<!--sidebar-->
@include('superadmin.sidebar')
<!--sidebar-->
<main class="page-content">
    <div>
        <div class="col-lg-12 ">
            <h6 style="color: blue; font-size:30px; font-weight:bold;" class="mb-0 text-center text-uppercase">{{$user->user_type}} Profile</h6>
            <div class="card">

                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="post" action="/superadmin/save_profile" enctype="multipart/form-data">
                            @csrf                         
                            <div class="col-12">                          
                                <div style="text-align: center;">
                                    <img src="{{asset($user->image)}}" alt="Super Admin Image"  style="border-radius: 50%; height:200; width:auto; border:5px solid blue;" id="output">
                                </div>

                            </div>
                            <div class="col-6" style="display: none;">
                                <label class="form-label">ID</label>
                                <input class="form-control" value="{{ $user->id }}" name="id">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Name </label>
                                <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" value="{{ $user->address }}" placeholder="example@example.com" name="address">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" value="{{$user->password}}" id="myInput">
                                <div class="">
                                    <input type="checkbox" onclick="myFunction()" id="check" style="height:16px; width:16px;">
                                    <label for="check"><b style="color:blue;">Show Password</b></label>
                                </div>


                            </div>
                            <div class="col-6">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" value="{{ $user->phone }}" name="phone">
                            </div>
                            <div class="col-6">
                                <label class="form-label"><b>Gender</b></label>
                                <select class="single-select" name="gender" value="null" required>

        <option value="Male" @if($user->gender=='Male') selected @endif>Male</option>
        <option value="Female" @if($user->gender=='Female') selected @endif>Female</option>

                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Date Of Join</label>
                                <input type="date" class="form-control" value="{{ $user->date_of_join }}" name="doj">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label"><b>Position</b></label>
                                <select class="single-select" name="position"  required>
                                    <option value="superadmin" @if($user->user_type=='superadmin')selected @endif>Super Admin</option>
                                    <option value="admin" @if($user->user_type=='admin')selected @endif>Admin</option>
                                    <option value="waiter" @if($user->user_type=='waiter')selected @endif>Waiter</option>
                                    <option value="kitchener" @if($user->user_type=='kitchener')selected @endif>Kitchener</option>
                                    <option value="accountant" @if($user->user_type=='accountant')selected @endif>Accountant</option>
                                </select>
                            </div>
                            <div class="col-12  col-lg-6">
                                <label class="form-label"><b> Image Upload</b></label>
                                <input name="image" type="file" class="form-control" placeholder="Link" onchange="loadFile(event)">

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