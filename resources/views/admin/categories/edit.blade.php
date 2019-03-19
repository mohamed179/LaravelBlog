@extends('admin.layouts.layout')

@section('page-title', 'Update a Category')

@section('category_section_active', 'active')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update category with name: "{{ $category->name }}
      </h1>
      @include('includes.messages')
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- form start -->
          <form role="form" method="post" action="{{ route('categories.update', $category->id) }}">
            @method('put')
            @csrf
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Name and slug</h3>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="name">Category name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                      <label for="slug">Category slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter category slug" value="{{ $category->slug }}">
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" href="{{ route('categories.index') }}">Cancel</a>
          </form>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
