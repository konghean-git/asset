@extends('layouts.master')


@section('top_menu')
<a class="navbar-brand p-2" href="{{url('asset/home')}}"><i class="fas fa-home"></i></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent-333" style="padding-left: 0;">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{url('users')}}">Employees
                <span class="sr-only">(current)</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Dropdown
            </a>
            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li> -->
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope"></i>
            </a>
            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
@endsection

@section('content')
<div class="container">
    <br />
    <form class="form-horizontal form-label-left" action="{{url('users/create/submit')}}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3">ID Number</label>
                    <div class="col-md-9 col-sm-9  ">
                        <div class="input-group m-0">
                            <input id="code" type="text" value="{{$last_code}}" name="code"
                                class="rounded form-control form-control-sm" readonly
                                required>
                            <button id="edit-code" class="btn btn-sm btn-outline-secondary"
                                type="button" id="button-addon2"><i id="ico-code"
                                    class="fa fa-edit"></i></button>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3">ID Number</label>
                    <div class="col-md-9 col-sm-9  ">
                        <div class="input-group m-0">
                            <input type="text" id="code" value="{{$last_code}}" name="code"
                                class="form-control form-control-sm rounded-left" readonly
                                required />
                            <span class="input-group-addon rounded-right bg-light" id="edit-code"><i
                                    id="ico-code" class="fa fa-edit"></i></span>
                        </div>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" name="name" value="{{old('name')}}"
                            class="form-control form-control-sm rounded" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Gender</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <select name="gender" id="condition"
                            class="form-control form-control-sm rounded" style="color: #495057;"
                            required>
                            <option value="" disabled selected hidden>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Branch</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <select name="branch_id" id="condition"
                            class="form-control form-control-sm rounded" style="color: #495057;"
                            required>
                            <option value="" disabled selected hidden>Select Branch</option>
                            @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Division</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" name="division"
                            class="form-control form-control-sm rounded" value="{{old('serial')}}"
                            required>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Department</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" name="department" value="{{old('department')}}"
                            class="form-control form-control-sm rounded" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Position</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" name="position" value="{{old('position')}}"
                            class="form-control form-control-sm rounded" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="email" name="email" value="{{old('email')}}"
                            class="form-control form-control-sm rounded">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone Number</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" name="phone" value="{{old('phone')}}"
                            class="form-control form-control-sm rounded">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Status</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <select name="status" id="condition"
                            class="form-control form-control-sm rounded" style="color: #495057;"
                            required>
                            <option value="" disabled selected hidden>Select Status</option>
                            <option value="1">ON</option>
                            <option value="2">OFF</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="float-right">
                        <a class="btn btn-sm btn-secondary text-light" href="{{url('users')}}"
                            style="cursor: pointer;">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-success ">Submit</button>
                    </div>
                </div>

            </div>
            <div class="col-md-2">
                <div>
                    <div class="input-group mb-3">
                        <input style="width:80px; font-size:small; cursor:pointer;" type="file" name="image" id="image"
                            onchange="previewFile(this)">
                    </div>
                </div>
                <div class="">
                    <img class=" w-100 img-thumbnail" src="{{asset('images/none.jpg')}}"
                        id="previewImage" alt="none.jpg" srcset="">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('style')
<style>
#edit-code {
    cursor: pointer;
}
.form-control-sm{
    color: #495057;
}
.control-label{
    font-size: 12px;
    color: gray;
}
.form-control-sm,.form-group select{
    color: gray;
    font-size:12px;
}
</style>
@endsection

@section('script')
<script>
$(document).ready(function() {

    // Span Code Text
    $('#edit-code').click(function() {
        if ($('#ico-code').hasClass('fa-edit') == true) {
            $('#code').removeAttr('readonly');
            $('#ico-code').removeClass('fa-edit');
            $('#ico-code').addClass('fa-check-square');
        } else {
            $('#code').attr('readonly', true);
            $('#ico-code').addClass('fa-edit');
            $('#ico-code').removeClass('fa-check-square');
        }
    });
    // Code Textbox
    $('#code').blur(function() {
        $('#code').attr('readonly', true);
        $('#ico-code').addClass('fa-edit');
        $('#ico-code').removeClass('fa-check-square');
    });

});

function previewFile(input) {
    var file = $("input[type=file]").get(0).files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $('#previewImage').attr('src', reader.result);
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endsection