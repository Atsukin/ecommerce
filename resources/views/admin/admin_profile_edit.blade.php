@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Form Validation</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Forms</li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Validation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Admin Profile Edit</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5><label for="email">Email Field <span class="text-danger">*</span></label></h5>
                                                        <div class="controls">
                                                            <input
                                                                type="email"
                                                                name="email"
                                                                id="email"
                                                                value="{{ $editData->email }}"
                                                                class="form-control"
                                                                required
                                                                data-validation-required-message="This field is required"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5><label for="name">Admin User Name <span class="text-danger">*</span></label></h5>
                                                        <div class="controls">
                                                            <input
                                                                type="text"
                                                                name="name"
                                                                id="name"
                                                                class="form-control"
                                                                value="{{ $editData->name }}"
                                                                required
                                                                data-validation-required-message="This field is required"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>File Input Field <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="profile_photo_path" id="image" class="form-control" value="{{ $editData->email }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <img
                                                        src="{{ (!empty( $editData->profile_photo_path ))? url('upload/admin_images/' . $editData->profile_photo_path):url('upload/no-image.jpeg') }}"
                                                        id="showImage"
                                                        style="width: 100px; height: 100px; object-fit: cover;"
                                                        alt="User Avatar"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })

    </script>
@endsection
