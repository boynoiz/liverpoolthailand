<?php

namespace LTF\Http\Controllers\Api\DataTables;

use Carbon\Carbon;
use LTF\FootballMatches;
use Jenssegers\Date\Date;
use Yajra\Datatables\Services\DataTable;

class FixtureDataTable extends DataTable
{
    // protected $printPreview  = 'path.to.print.preview.view';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $match = $this->query();
        $datatables = $this->datatables
            ->eloquent($match)
            ->addColumn('score', function ($match)
            {
                if ($match->status === $match->time or $match->status === 'Postp.')
                {
                    return $match->localteam_score . ' v ' . $match-> visitorteam_score;
                }
                return '<a href="matches/'.$match->match_id.'/events">'.$match->localteam_score . ' - ' . $match-> visitorteam_score.'</a>';
            })
            ->editColumn('localteam_name', '<a href="teams/{{$localteam_id}}">{{$localteam_name}}</a>')
            ->editColumn('visitorteam_name', '<a href="teams/{{$visitorteam_id}}">{{$visitorteam_name}}</a>');
        return $datatables->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $fixtures = FootballMatches::select(['*']);
        $fixtures->orderBy('formatted_date', 'asc')->get();
        return $this->applyScopes($fixtures);

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            ['name' => 'formatted_date', 'title' => 'Date', 'data' => 'formatted_date'],
            ['name' => 'time', 'title' => 'Time', 'data' => 'time'],
            ['name' => 'localteam_name', 'title' => 'Home', 'data' => 'localteam_name'],
            ['name' => 'score', 'title' => 'Score', 'data' => 'score'],
//            ['name' => 'localteam_score', 'title' => 'Home Score', 'data' => 'localteam_score'],
//            ['name' => 'visitorteam_score', 'title' => 'Away Score', 'data' => 'visitorteam_score'],
            ['name' => 'visitorteam_name', 'title' => 'Away', 'data' => 'visitorteam_name'],
            ['name' => 'status', 'title' => 'Status', 'data' => 'status'],
        ];
    }

    public function getBuilderParameters()
    {
        return [
            'dom' => 'Bfrtip',
            'order'   => [[0, 'desc']],
            'buttons' => ['excel', 'pdf', 'print', 'reset', 'reload'],
            'pageLength' => '100',
        ];
    }
}
