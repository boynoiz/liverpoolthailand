<?php

namespace LTF\Http\Controllers\Api\DataTables;

use LTF\FootballStanding;
use Yajra\Datatables\Services\DataTable;

class PremierDataTable extends DataTable
{
    // protected $printPreview  = 'path.to.print.preview.view';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $standing = FootballStanding::whereSeason('2016/2017')
            ->select('position', 'team_name', 'overall_gp', 'overall_w', 'overall_d', 'overall_l', 'overall_gs', 'overall_ga', 'gd', 'points')
            ->orderBy('position', 'asc');
        return $this->applyScopes($standing);

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
            'position',
            'team_name',
            'overall_gp',
            'overall_w',
            'overall_d',
            'overall_l',
            'overall_gs',
            'overall_ga',
            'gd',
            'points'
        ];
    }

    public function getBuilderParameters()
    {
        return [
            'dom' => 'Bfrtip',
            'order'   => [[0, 'desc']],
            'buttons' => ['excel', 'pdf', 'print', 'reset', 'reload'],
            'pageLength' => '20',
        ];
    }
}
