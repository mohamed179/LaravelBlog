@extends('admin.layouts.layout')

@section('page-title', 'Create a post')

@section('additional-styles')
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('post_section_active', 'active')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create a post
      </h1>
      <div style="margin-top:5px">
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
        @endif
      </div>
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
          <form role="form" method="post" action="{{ route('posts.store') }}">
            @csrf
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Titles and photos</h3>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="title">Post title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title">
                    </div>
                    <div class="form-group">
                      <label for="title">Post subtitle</label>
                      <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter post subtitle">
                    </div>
                    <div class="form-group">
                      <label for="title">Post slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter post slug">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="image">Upload image</label>
                      <input type="file" id="image" name="image">
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="status">Publish
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Write post body
                  <small>Simple and fast</small>
                </h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body pad">
                  <textarea class="textarea" name="body" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>
            <!-- /.box -->
            <button type="submit" class="btn btn-primary">Submit</button>
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

@section('additional-scripts')
<script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
@endsection