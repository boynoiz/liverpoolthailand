<?php

namespace LTF\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Kris\LaravelFormBuilder\FormBuilder;
use LTF\Forms\Admin\FootballCompForm;
use LTF\FootballCompetition;
use LTF\Http\Requests\Admin\FootballCompRequest;
use LTF\Http\Controllers\Api\DataTables\CompetitionDataTable;
use Jenssegers\Date\Date;
use Laracasts\Flash\Flash;
use Queue;
use LTF\Jobs\ImageResizerJob;
use LTF\Http\Requests;
use LTF\Http\Controllers\Controller;

class FootballCompetitionsController extends Controller
{
    /**
     * @param CompetitionDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(CompetitionDataTable $dataTable)
    {
        return $dataTable->render('admin.football_competitions.index');
    }

    /**
     * Display a team detail.
     *
     * @param FootballCompetition $competition
     * @param $compId
     * @return Response
     */
    public function show(FootballCompetition $competition, $compId)
    {
        $showComp = $competition->whereCompId($compId)->first();
        return view('admin.football_competitions.show', compact('showComp'));
    }

    /**
     * Show the form for editing the specified team.
     *
     * @param FormBuilder $formBuilder
     * @param FootballCompetition $competition
     * @param $compId
     * @return Response
     */
    public function edit(FormBuilder $formBuilder, FootballCompetition $competition, $compId)
    {
        $comp = $competition->whereCompId($compId)->first();
        $form = $formBuilder->create(FootballCompForm::class, [
            'method' => 'PATCH',
            'model' => $comp,
            'url' => route('admin.football.competitions.update', ['comp' => $comp->comp_id]),
            'data' => ['compId' => $comp->comp_id]
        ]);
        return view('admin.football_competitions.edit', compact('form'));
    }

    /**
     * Update the specified team in storage.
     *
     * @param FootballCompetition $competition
     * @param FootballCompRequest $request
     * @param $comId
     * @return Response
     */
    public function update(FootballCompetition $competition, FootballCompRequest $request, $comId)
    {
        $getData = $this->getImage($request);
        $competition->whereCompId($comId)->update($getData) ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return $this->show($competition, $comId);
    }

    public function destroy()
    {
        //
    }

    public function getImage($request)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = rename_file('complogo', $file->getClientOriginalExtension());
            $date = Date::create()->now()->format('Y-m');
            $path = '/assets/images/complogo/' . $date . '/';
            $move_path = public_path() . $path;
            $file->move($move_path, $fileName);
            Queue::push(ImageResizerJob::class, ['path' => $path, 'filename' => $fileName]);
            $data = $request->except('_method', '_token', 'logo');
            $data['image_path'] = $path;
            $data['image_name'] = $fileName;
            return $data;
        }
        return $request->except('_method', '_token', 'logo');
    }
}
