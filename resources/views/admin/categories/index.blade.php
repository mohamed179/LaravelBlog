@extends('admin.layouts.layout')

@section('page-title', 'All categories')

@section('additional-styles')
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('category_section_active', 'active')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      All categories
      </h1>
      @include('includes.messages')
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
              <h3 class="box-title">Categories datatables</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- TODO: fix not showing search textbox when no. of columns of
                         table headers less than table data -->
              <table id="categories_datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category name</th>
                  <th>Category slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <td><a href="{{ route('categories.show', $category->id) }}">
                        {{ $category->name }}
                    </a></td>
                    <td>{{ $category->slug }}</td>
                    <!-- TODO: enable deleting -->
                    <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></a></td>
                    <td>
                      <form role="form" class="form-inline form-delete" method="post" action="{{ route('categories.destroy', $category->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Category name</th>
                  <th>Category slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <a href="{{ route('categories.create') }}" class="btn btn-success">Create a new category</a>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@include('includes.modals.delete')

@section('additional-scripts')
<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#categories_datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
$('#categories_datatable').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').css("visibility", "visible");
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
});
</script>
@endsection
