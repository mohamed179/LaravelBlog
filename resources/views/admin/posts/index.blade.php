@extends('admin.layouts.layout')

@section('page-title', 'All posts')

@section('additional-styles')
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('post_section_active', 'active')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All posts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Posts datatables</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- TODO: fix not showing search textbox when no. of columns of
                         table headers less than table data -->
              <table id="posts_datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Post title</th>
                  <th>Post subtitle</th>
                  <th>Post slug</th>
                  <th>Posted by</th>
                  <th>Likes</th>
                  <th>Dislikez</th>
                  <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                  <tr>
                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->subtitle }}</td>
                    <td>{{ $post->slug }}</td>
                    <!-- TODO: view the posted by field -->
                    <td>admin</td>
                    <td>{{ $post->likes }}</td>
                    <td>{{ $post->dislikes }}</td>
                    <td>{{ $post->created_at }}</td>
                    <!-- TODO: enable deleting -->
                    <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Post title</th>
                  <th>Post subtitle</th>
                  <th>Post slug</th>
                  <th>Posted by</th>
                  <th>Likes</th>
                  <th>Dislikez</th>
                  <th>Created at</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('additional-scripts')
<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#posts_datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
