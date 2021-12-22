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
                    <form role="form" action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            @include('includes.messages')
                            <div class="col-md-offset-3 col-md-6">


                                <div class="form-group ">
                                    <div class="form-group" style="background-color: black;">
                                        <img src="{{ Storage::url($logo_mobile->value) }}"  alt="User Image" id="preview" onchange="previewImage(this)">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload mobile logo <small class="text-warning"><b>65px height</b></small></label>
                                        <input type="file" name="logo_mobile" accept="image/*" class="form-control" id="darklogo">
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="form-group" style="background-color: black;">
                                        <img src="{{ Storage::url($logo_desktop->value) }}"  alt="User Image" id="preview1" onchange="previewImage(this)">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload desktop logo <small class="text-warning"><b>70px height</b></small></label>
                                        <input type="file" name="logo_desktop" accept="image/*" class="form-control" id="lightlogo">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="form-group ">
                                        <img src="{{ Storage::url($favicon->value) }}"  alt="User Image" id="preview2" height="50px" width="50px" onchange="previewImage(this)">
                                    </div>
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Upload favicon</label>
                                        <input type="file" name="favicon" accept="image/*" class="form-control" id="favicon">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="slug">Mobile number</label>
                                    <input type="tel" class="form-control" id="slug" name="mobile" placeholder="+254 707 338839" required="required" value="{{ $mobile->value }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Whatsapp number</label>
                                    <input type="tel" class="form-control" id="slug" name="whatsapp" placeholder="+254 707 338839" required="required" value="{{ $whatsapp->value }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Email</label>
                                    <input type="email" class="form-control" id="slug" name="email" placeholder="support@codeisystems.co.ke" required="required" value="{{ $email->value }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Facebook</label>
                                    <input type="url" class="form-control" id="slug" name="facebook" placeholder="Fb page link" required="required" value="{{ $facebook->value }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Instagram</label>
                                    <input type="url" class="form-control" id="slug" name="instagram" placeholder="Instagram page link" required="required" value="{{ $instagram->value }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Twitter</label>
                                    <input type="url" class="form-control" id="slug" name="twitter" placeholder="Twitter page link" required="required" value="{{ $twitter->value }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Youtube</label>
                                    <input type="url" class="form-control" id="slug" name="youtube" placeholder="Youtube page link" required="required" value="{{ $youtube->value }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Address</label>
                                    <input type="text" class="form-control" id="slug" name="address" placeholder="Address" required="required" value="{{ $address->value }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Map url</label>
                                    <input type="url" class="form-control" id="slug" name="map" placeholder="Google map address" required="required" value="{{ $map->value }}">
                                </div>

                                <div class="form-group">
                                    <label>Home banner button text</label>
                                    <input type="text" class="form-control" name="button_text" placeholder="eg Watch Youtube" value="{{ $button_text->value }}">
                                </div>

                                <div class="form-group">
                                    <label>Home banner button url</label>
                                    <input type="text" class="form-control" name="button_url" placeholder="eg youtube video link" value="{{ $button_url->value }}">
                                </div>

                                <div class="form-group">
                                    <label>Home banner title text</label>
                                    <input type="text" class="form-control" name="home_banner_text" placeholder="eg The wolf of real estate" value="{{ $home_banner_text->value }}">
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

        $("#darklogo").change(function(){
            readURL(this,'#preview');
        });
        $("#lightlogo").change(function(){
            readURL(this,'#preview1');
        });
        $("#favicon").change(function(){
            readURL(this,'#preview2');
        });
        $("#about_image").change(function(){
            readURL(this,'#preview3');
        });

    </script>
@endsection
@endsection
