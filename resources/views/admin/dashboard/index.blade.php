@extends('layouts.admin', ['no_boxes' => true])
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- START ALERTS AND CALLOUTS -->
        <h2 class="page-header">Articles</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-book"></i>
                        <h3 class="box-title">5 Latest Articles</h3>
                        <button type="button" class="btn-xs btn-info" formaction="{{ url('admin/article/create') }}">Create New</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3>Work in progress...</h3>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-bullhorn"></i>

                        <h3 class="box-title">Task Jobs</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3>Work in progress...</h3>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ALERTS AND CALLOUTS -->
    </section>
    <!-- /.content -->
@endsection