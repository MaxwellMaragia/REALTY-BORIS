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
            <li><a href="{{ route('service.index') }}">Services</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Services</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            @include('includes.messages')
                            <div class="col-md-offset-3 col-md-6">
                                <div class="form-group ">
                                    <div class="form-group">
                                        <img src="{{ Storage::url($first_image->value) }}"  alt="User Image" id="preview" width="100%" onchange="previewImage(this)">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload team image for homepage</label>
                                        <input type="file" name="first_image" accept="image/*" class="form-control" id="firstimage">
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="form-group ">
                                        <img src="{{ Storage::url($second_image->value) }}"  alt="User Image" id="preview1" onchange="previewImage(this)" width="100%">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload team image for about page</label>
                                        <input type="file" name="second_image" accept="image/*" class="form-control" id="secondimage">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="editor1">About us text body</label>
                                    <textarea name="about_text" id="editor1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{ $about_text->value }}
                                        </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="editor1">Our history text body</label>
                                    <textarea name="our_history" id="editor1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{ $our_history->value }}
                                        </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="carousel">Our brokerage gallery images <small class="text-danger">(!previously uploaded images will be lost)</small></label>
                                    <input type="file" class="form-control" multiple name="carousel[]">
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
        $(function () {

            // instance, using default configuration.
            CKEDITOR.replace( 'editor1');

        })
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


    </script>
@endsection
@endsection
