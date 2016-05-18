<div class="tab-content clearfix" id="table">
    <div class="table-responsive">
        <table class="table table-no-bordered table-hover">
            <thead>
            <tr>
                <th>Position</th>
                <th>Team</th>
                <th>Played</th>
                <th>GD</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            @foreach($standing as $table)
                <tr {{ $table->team_id === 9249 ? 'class=liverpool' : ''}}>
                    <td>{{ $table->position }}</td>
                    <td>{{ $table->team_name }}</td>
                    <td>{{ $table->overall_gp }}</td>
                    <td>{{ $table->gd }}</td>
                    <td>{{ $table->points }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>