@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Team Logo -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ $showComp->image_path . $showComp->image_name }}" alt="{{ $showComp->name }} 's Logo">
                    <h3 class="profile-username text-center">{{ $showComp->name }}</h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Region</b> <a class="pull-right">{{ $showComp->region }}</a>
                        </li>
                    </ul>
                    <a href="{{ route('admin.football.competitions.edit', $showComp->comp_id) }}" class="btn btn-primary btn-block"><b>Edit Data</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#standing" data-toggle="tab">Competition Standing</a></li>
                    <li><a href="#statics" data-toggle="tab">Statics</a></li>
                </ul>
                <div class="tab-content">
                    <!-- tab-player -->
                    <div class="active tab-pane" id="players">
                        <!-- player list here -->
                    </div>
                    <!-- tab-transfers -->
                    <div class="tab-pane" id="transfers">
                        <!-- The transfers list here -->
                    </div>
                    <!-- tab-history -->
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection