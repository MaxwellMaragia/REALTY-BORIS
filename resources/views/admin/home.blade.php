@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $posts->count() }}</h3>

                            <p>Total posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-image"></i>
                        </div>
                        <a href="{{ route('post.index') }}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $properties->count() }}</h3>

                            <p>Total properties</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-home"></i>
                        </div>
                        <a href="{{ route('properties.index') }}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $active->count() }}</h3>

                            <p>Active properties</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-laptop"></i>
                        </div>
                        <a href="{{ route('properties.index') }}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                {{ $featured->count() }}
                            </h3>

                            <p>Featured properties</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-email"></i>
                        </div>
                        <a href="{{ route('properties.index') }}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Featured properties</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                @foreach($featured as $property)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{ Storage::url($property->image) }}" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            @if($property->featured == 1)
                                                <span class="label label-success pull-right">Featured</span>
                                            @else
                                                <span class="label label-danger pull-right">Not featured</span>
                                            @endif

                                            <a href="{{ route('properties.edit',$property->id) }}">
                                                    <span class="product-description">
                                                      {{ $property->name }}
                                                    </span>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Products</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recently Added Posts</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                @foreach($latest as $post)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{ Storage::url($post->image) }}" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            @if($post->status == 1)
                                                <span class="label label-success pull-right">Published</span>
                                            @else
                                                <span class="label label-danger pull-right">Unpublished</span>
                                                @endif

                                                <a href="{{ route('post.edit',$post->id) }}">
                                                    <span class="product-description">
                                                      {{ $post->title }}
                                                    </span>
                                                </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Products</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

    </div>

    @endsection
