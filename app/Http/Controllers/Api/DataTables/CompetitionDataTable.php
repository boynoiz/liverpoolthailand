<?php

namespace LTF\Http\Controllers\Api\DataTables;

use Carbon\Carbon;
use LTF\FootballCompetition;
use LTF\FootballMatches;
use Jenssegers\Date\Date;
use Yajra\Datatables\Services\DataTable;

class CompetitionDataTable extends DataTable
{
    // protected $printPreview  = 'path.to.print.preview.view';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $comp = $this->query();
        $datatables = $this->datatables
            ->eloquent($comp)
            ->addColumn('logo', function ($comp)
            {
                if (!empty($comp->image_name))
                {
                    return '<img style=max-height:50px class=img-responsive src="'.$comp->image_path . $comp->image_name.'">';
                }
                return null;
            })
            ->addColumn('action', function ($comp)
            {
                return '<a class="btn btn-xs bg-olive" href="competitions/'.$comp->comp_id.'/edit"><i class="fa fa-pencil-square-o"></i>'.trans('admin.ops.edit').'</a>';
            })
        ;
        return $datatables->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $comp = FootballCompetition::select(['*']);
        $comp->orderBy('comp_id', 'asc')->get();
        return $this->applyScopes($comp);

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
            ['name' => 'comp_id', 'title' => 'ID', 'data' => 'comp_id'],
            ['name' => 'name', 'title' => 'Name', 'data' => 'name'],
            ['name' => 'region', 'title' => 'Region', 'data' => 'region'],
            ['name' => 'logo', 'title' => 'Logo', 'data' => 'logo'],
            ['name' => 'action', 'title' => 'Action', 'data' => 'action'],
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
