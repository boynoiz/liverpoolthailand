<?php

namespace LTF\Http\Controllers\Admin;

use LTF\Base\Controllers\AdminController;
use LTF\Http\Controllers\Api\DataTables\UserDataTable;
use LTF\Http\Requests\Admin\UserRequest;
use LTF\User;
use Auth;

class UserController extends AdminController
{
    
    /**
     * Image column of the model
     *
     * @var string
     */
    private $imageColumn = "picture";

    /**
     * Display a listing of the users.
     *
     * @param UserDataTable $dataTable
     * @return Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render($this->viewPath());
    }

    /**
     * Store a newly created user in storage
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $request->image = $this->imageColumn;
        return $this->createFlashRedirect(User::class, $request);
    }

    /**
     * Display the specified user.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return $this->viewPath("show", $user);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        return $this->getForm($user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param User $user
     * @param UserRequest $request
     * @return Response
     */
    public function update(User $user, UserRequest $request)
    {
        $request->image = $this->imageColumn;
        return $this->saveFlashRedirect($user, $request);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        if ($user->id != Auth::user()->id) {
            return $this->destroyFlashRedirect($user);
        } else {
            return $this->redirectRoutePath("index", "admin.delete.self");
        }
    }
}