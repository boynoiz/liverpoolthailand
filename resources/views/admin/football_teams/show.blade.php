@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Team Logo -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ $showTeam->image_path . $showTeam->image_name }}" alt="{{ $showTeam->name }} 's Logo">
                    <h3 class="profile-username text-center">{{ $showTeam->name }}</h3>
                    <p class="text-muted text-center">{{ $showTeam->shortname }}</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Country</b> <a class="pull-right">{{ $showTeam->country }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Founded</b> <a class="pull-right">{{ $showTeam->founded }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Venue</b> <a class="pull-right">{{ $showTeam->venue_name .', '. $showTeam->venue_address .', '. $showTeam->venue_city }}</a>
                        </li>
                    </ul>
                    <a href="{{ route('admin.football.teams.edit', $showTeam->team_id) }}" class="btn btn-primary btn-block"><b>Edit Data</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About {{ $showTeam->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Current Manager</strong>
                    <p class="text-muted">
                        {{ $showTeam->coach_name }}
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> In Competitions</strong>
                    <p class="text-muted">{{ $showTeam->leagues }}</p>
                    <hr>
                    <strong><i class="fa fa-pencil margin-r-5"></i> Statistics</strong>
                    <p>

                    </p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#players" data-toggle="tab">Team Players</a></li>
                    <li><a href="#transfers" data-toggle="tab">Player Transfers</a></li>
                    <li><a href="#history" data-toggle="tab">Team History</a></li>
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
                    <div class="tab-pane" id="history">
                        <!-- the history textarea here -->
                    </div>
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