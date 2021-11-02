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
            Edit member
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('members.index') }}">members</a></li>
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
                        <h3 class="box-title">members</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('members.update',$member->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="box-body">
                            @include('includes.messages')
                            <div class="col-md-offset-3 col-md-6">
                                <div class="form-group text-center">
                                    <img src="{{ Storage::url($member->image) }}"  alt="User Image" id="preview" height="140px" width="120px" onchange="previewImage(this)">
                                </div>

                                <div class="form-group text-center">
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Browse image</label>
                                        <input type="file" name="image" accept="image/*" class="form-control" id="avatar">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="slug">Name</label>
                                    <input type="text" class="form-control" id="slug" name="name" placeholder="Main title" required="required" value="{{ $member->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Role</label>
                                    <input type="text" class="form-control" id="slug" name="role" placeholder="Role" required="required" value="{{ $member->role }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Website</label>
                                    <input type="text" class="form-control" id="slug" name="website" placeholder="If not present, put #" required="required" value="{{ $member->website }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Facebook</label>
                                    <input type="text" class="form-control" id="slug" name="facebook" placeholder="If not present, put #" required="required" value="{{ $member->facebook }}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Linkedin</label>
                                    <input type="text" class="form-control" id="slug" name="linkedin" placeholder="If not present, put #" required="required" value="{{ $member->linkedin }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Short description</label>
                                    <textarea class="form-control" rows="3" placeholder="Write short description...." name="short_description">
                                            {{ $member->short_description }}
                                        </textarea>

                                </div>

                                <div class="form-group">
                                    <label for="slug">Service status</label><br>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="status"
                                                      @if($member->status==1)
                                                      checked
                                                    @endif
                                            > Activate</label>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="{{ route('service.index') }}">Back</a>
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
    <script type="text/javascript">

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#avatar").change(function(){
            readURL(this);
        });
    </script>
@endsection
@endsection