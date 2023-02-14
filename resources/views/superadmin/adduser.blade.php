@extends('layouts.master')
@section('title')
<title>Add User</title>
@endsection
@section('content')
<!--sidebar-->
@include('superadmin.sidebar')
<!--sidebar-->


<!--start content-->
<main class="page-content">


    <div class="row">
       

                <div class="card-body">
           
                        <div class="">
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">

                                   

                                    <form class="row g-3" id="form" action="{{ '/post_user'}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div>
                                        @error('name')
                                       {{ $message }}
                                        @enderror
                                    </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label"><b>User Name</b></label>
                                            <input name="name" type="text" class="form-control" placeholder="User Name" required>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <label class="form-label"><b>Position: </b></label>
                                            <select class="single-select" name="position" required>
                                                <option value="null">Select</option>
                                                <option value="admin">Admin</option>
                                                <option value="kitchener">Kitchener</option>
                                                <option value="waiter">Waiter</option>
                                                <option value="accountant">Accountant</option>
                                            </select>
                                        </div>


                                        <div class="col-12 col-lg-6">
                                            <label class="form-label"><b> Address</b></label>
                                            <input name="address" class="form-control" placeholder="Address" rows="4" cols="4" required></input>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <label class="form-label"><b> Phone</b></label>
                                            <input name="phone" type="text" class="form-control" placeholder="Phone" required>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label"><b> Email</b></label>
                                            <input name="email" type="text" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label"><b> Password</b></label>
                                            <input name="password" type="text" class="form-control" placeholder="Password" required>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <label class="form-label"><b> Gender</b></label>
                                            <select class="single-select" name="gender" required>
                                                <option value="null" selected>Select</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>

                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label"><b> Date Of Join</b></label>
                                            <input name="doj" type="date" class="form-control" placeholder="Date Of Join" required>
                                        </div>
                                        <img src="https://cpworldgroup.com/wp-content/uploads/2021/01/placeholder.png" id="output" style="height: 100px; width:auto;" />
                                        <div class="col-12  col-lg-6">
                                            <label class="form-label"><b> Image Upload</b></label>
                                            <input name="image" type="file" class="form-control" placeholder="Link" onchange="loadFile(event)" required>
                                        </div>

                                        <div class="col-12 ">
                                            <div class="">
                                                <button style="display: block;margin-right:auto;margin-right:auto;" class="btn btn-success" type="submit">Save User</button>
                                            </div>

                                        </div>



                                    </form>
                                </div>
                            </div>
                   

                 

                </div>
                <!--end row-->
          
    </div>
    </div>
    <!--end row-->

</main>
<!--end page main-->
<script>
    var loadFile = function(event) {
        console.log(event);
        var output = document.getElementById('output');
        console.log(output);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection