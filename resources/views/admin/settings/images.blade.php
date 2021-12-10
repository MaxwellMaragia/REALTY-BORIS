@extends('admin.layouts.app')
@section('main-content')
@section('headSection')
    <style>
        .file {
            position: relative;
            height: 35px;
        }

        .file > input[type="file"] {
            position: absolute;
            opacity: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }


    </style>
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit services
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit settings</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Image Settings</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            @include('includes.messages')
                            <div class="col-md-offset-3 col-md-6">
                                <div class="form-group ">
                                    <div class="form-group">
                                        <img src="{{ Storage::url($featured_listings->value) }}"  alt="User Image" id="preview" width="50%" onchange="previewImage(this)">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload featured listings image</label>
                                        <input type="file" name="featured_listings" accept="image/*" class="form-control" id="firstimage">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group ">
                                        <img src="{{ Storage::url($boris_yelstine->value) }}"  alt="User Image" id="preview1" onchange="previewImage(this)" width="50%">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload boris yelstine image</label>
                                        <input type="file" name="boris_yelstine" accept="image/*" class="form-control" id="secondimage">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="form-group ">
                                        <img src="{{ Storage::url($realty_boris->value) }}"  alt="User Image" id="preview2" onchange="previewImage(this)" width="50%">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload realty boris image</label>
                                        <input type="file" name="realty_boris" accept="image/*" class="form-control" id="thirdimage">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="form-group ">
                                        <img src="{{ Storage::url($our_brokerage->value) }}"  alt="User Image" id="preview3" onchange="previewImage(this)" width="50%">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload our brokerage image</label>
                                        <input type="file" name="our_brokerage" accept="image/*" class="form-control" id="fourthimage">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="form-group ">
                                        <img src="{{ Storage::url($our_history->value) }}"  alt="User Image" id="preview4" onchange="previewImage(this)" width="50%">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload our history image</label>
                                        <input type="file" name="our_history" accept="image/*" class="form-control" id="fifthimage">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="form-group ">
                                        <img src="{{ Storage::url($background->value) }}"  alt="User Image" id="preview5" onchange="previewImage(this)" width="50%">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload background image</label>
                                        <input type="file" name="background" accept="image/*" class="form-control" id="sixthimage">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="{{ route('settings.index') }}">Back</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->
@section('footerSection')
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">

        function readURL(input,loadscreen) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(loadscreen).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#firstimage").change(function(){
            readURL(this,'#preview');
        });
        $("#secondimage").change(function(){
            readURL(this,'#preview1');
        });
        $("#thirdimage").change(function(){
            readURL(this,'#preview2');
        });
        $("#fourthimage").change(function(){
            readURL(this,'#preview3');
        });
        $("#fifthimage").change(function(){
            readURL(this,'#preview4');
        });
        $("#sixthimage").change(function(){
            readURL(this,'#preview5');
        });

    </script>
@endsection
@endsection
