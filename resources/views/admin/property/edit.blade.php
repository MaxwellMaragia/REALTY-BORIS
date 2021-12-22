@extends('admin.layouts.app')
@section('main-content')

@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
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
            Edit property
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('properties.index') }}">Properties</a></li>
            <li class="active">Edit property</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="{{ route('properties.update',$property->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    @include('includes.messages')
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Property details</a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Description</a></li>
                            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">SEO</a></li>
                            <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Media</a></li>
                            <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Status</a></li>

                            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="subtitle">Location<span class="text-danger">*</span></label>
                                            <label for="subtitle">Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" required="required" placeholder="eg KILIMANI 3 BEDROOM WITH SQ" value="{{ $property->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Price (ksh)<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="eg 20,000/month" required="required" value="{{ $property->price }}">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Youtube video link</label>
                                                <input type="url" class="form-control" name="video" placeholder="Youtube video link" value="{{ $property->video }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="title">Size (ft)<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="size" name="size" placeholder="eg 200 sqft"  value="{{ $property->size }}" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Number of bedrooms<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="bedroom" name="bedroom" placeholder="eg 0"  value="{{ $property->bedroom }}" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Number of bathrooms<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="bathroom" name="bathroom" placeholder="eg 0"  value="{{ $property->bathroom }}" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Location</label>
                                            <select name="location" id="" class="form-control" required="required">
                                                @foreach($locations as $location)
                                                    <option value="{{ $location->id }}" @if($property->location == $location->id)
                                                    selected
                                                        @endif>{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Set as new development</label><br>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="new_development" id="new_development"
                                                              @if($property->new_development==1)
                                                              checked
                                                        @endif
                                                    > New development</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Completion date <small class="text-info">(If property is under new development/optional)</small></label>
                                            <input type="date" class="form-control" id="completion_date" name="completion_date" placeholder="Completion date"  value="{{ $property->completion_date }}" @if($property->new_development!=1)disabled="disabled"@endif>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="title">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="editor1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{ $property->description }}
                                    </textarea>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Meta author</label>
                                            <input type="text" class="form-control" id="meta_author" name="meta_author" placeholder="Enter author" value="{{ $property->meta_author }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="subtitle">Meta title</label>
                                            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title" value="{{ $property->meta_title  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">Meta description</label>
                                            <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter description" value="{{ $property->meta_description }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Meta keywords</label>
                                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter SEO keywords separated by ," value="{{ $property->meta_keywords }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Upload default image (350px by 250px)</label><span class="text-danger">*</span>
                                                <img src="{{ Storage::url($property->image) }}"  alt="User Image" id="preview" height="auto" width="100%" onchange="previewImage(this)">
                                            </div>
                                            <div class="file">
                                                <label for="avatar" class="btn bg-navy"><span class="fa fa-upload"></span> Upload default image</label>
                                                <input type="file" name="image" accept="image/*" class="form-control" id="default">
                                            </div>
                                        </div>
                                        <label for="video">Upload new carousel images <span class="text-danger">(height must be 533px)</span></label>
                                        <input type="file" name="carousel[]" class="form-control" multiple accept="image/*"/>
                                    </div>

                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <label for="slug">Feature property</label><br>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="featured"
                                                              @if($property->featured==1)
                                                              checked
                                                        @endif
                                                    > Feature</label>
                                            </div>

                                            <label for="slug">Set status as active</label><br>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="status"
                                                              @if($property->status==1)
                                                              checked
                                                        @endif
                                                    > Activate</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-warning" href="{{ route('properties.index') }}">Back</a>

                </form>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@section('footerSection')

    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {

            // instance, using default configuration.
            CKEDITOR.replace( 'editor1');

        })
    </script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });

        $('#new_development').change(function(){
            if($(this).is(":checked")) {
                $('#completion_date').removeAttr('disabled');
            } else {
                $('#completion_date').attr('disabled','disabled');
            }
        });

        function readURL(input,loadscreen) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(loadscreen).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#default").change(function(){
            readURL(this,'#preview');
        });

        $("#banner").change(function(){
            readURL(this,'#preview1');
        });

        function activatePlacesSearch() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
    </script>
@endsection

@endsection
