<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Queue;
use Jenssegers\Date\Date;
use App\FootballTeams;
use App\Base\Controllers\AdminController;
use App\Forms\Admin\FootballTeamsForm;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests\Admin\FootballTeamsRequest;
use Laracasts\Flash\Flash;
use App\Jobs\ImageResizerJob;

class FootballTeamsController extends AdminController
{

    /**
     * Display a listing of the articles.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * Display a team detail.
     * 
     * @param FootballTeams $footballTeams
     * @param $teamId
     * @return Response
     */
    public function show(FootballTeams $footballTeams, $teamId)
    {
        $showTeam = $footballTeams->whereTeamId($teamId)->first();
        return view('admin.football_teams.show', compact('showTeam'));
    }

    /**
     * Show the form for editing the specified team.
     *
     * @param FormBuilder $formBuilder
     * @param FootballTeams $footballTeams
     * @param $teamId
     * @return Response
     */
    public function edit(FormBuilder $formBuilder, FootballTeams $footballTeams, $teamId)
    {
        $team = $footballTeams->whereTeamId($teamId)->first();
        $form = $formBuilder->create(FootballTeamsForm::class, [
            'method' => 'PATCH',
            'model' => $team,
            'url' => route('admin.football.teams.update', ['team' => $team->team_id]),
            'data' => ['teamId' => $team->team_id]
        ]);
        return view('admin.football_teams.edit', compact('form'));
    }

    /**
     * Update the specified team in storage.
     *
     * @param FootballTeams $footballTeams
     * @param FootballTeamsRequest $request
     * @param $teamId
     * @return Response
     */
    public function update(FootballTeams $footballTeams, FootballTeamsRequest $request, $teamId)
    {
        $getData = $this->getImage($request);
        $footballTeams->whereTeamId($teamId)->update($getData) ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return $this->show($footballTeams, $teamId);
    }

    /**
     *
     */
    public function destroy()
    {
        //
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getImage($request)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = rename_file('teamlogo', $file->getClientOriginalExtension());
            $path = '/assets/images/teamlogo/';
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
