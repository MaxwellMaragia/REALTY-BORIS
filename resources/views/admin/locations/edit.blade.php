@extends('admin.layouts.app')
@section('main-content')
@section('headSection')
    <style>
        .file {
            position: relative;
            height: 35px;
        }

        .file > input[location="file"] {
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
            Edit locations
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('locations.index') }}">locations</a></li>
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
                        <h3 class="box-title">Property locations</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('locations.update',$location->id) }}" method="post" enclocation="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="box-body">
                            @include('includes.messages')
                            <div class="col-md-offset-3 col-md-6">
                                <div class="form-group">
                                    <label for="slug">location name</label>
                                    <input location="text" class="form-control" id="slug" name="name" placeholder="Main title" required="required" value="{{ $location->name }}">
                                </div>
                            </div>

                        </div>

                        <div class="box-footer">
                            <button location="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="{{ route('locations.index') }}">Back</a>
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
@endsection
