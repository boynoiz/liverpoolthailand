<?php

namespace LTF\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use LTF\Base\Controllers\AdminController;
use LTF\Category;
use LTF\Http\Controllers\Api\DataTables\LanguageDataTable;
use LTF\Http\Requests\Admin\LanguageRequest;
use LTF\Language;
use Input;
use Redirect;

/**
 * Class LanguageController
 * @package LTF\Http\Controllers\Admin
 */
class LanguageController extends AdminController
{
    /**
     * Image column of the model
     *
     * @var string
     */
    private $imageColumn = "flag";

    /**
     * @var string
     */
    private $languages = "languages";

    /**
     * Display a listing of the languages.
     *
     * @param LanguageDataTable $dataTable
     * @return Response
     */
    public function index(LanguageDataTable $dataTable)
    {
        return $dataTable->render($this->viewPath());
    }

    /**
     * Store a newly created language in storage
     *
     * @param LanguageRequest $request
     * @return Response
     */
    public function store(LanguageRequest $request)
    {
        $request['image'] = $this->imageColumn;
        $language = $this->languages;
        return $this->createFlashRedirect($language, $request);
    }

    /**
     * Display the specified language.
     *
     * @param Language $language
     * @return Response
     */
    public function show(Language $language)
    {
        return $this->viewPath("show", $language);
    }

    /**
     * Show the form for editing the specified language.
     *
     * @param Language $language
     * @return Response
     */
    public function edit(Language $language)
    {
        return $this->getForm($language);
    }

    /**
     * Update the specified language in storage.
     *
     * @param Language $language
     * @param LanguageRequest $request
     * @return Response
     */
    public function update(Language $language, LanguageRequest $request)
    {
        $request['image'] = $this->imageColumn;
        return $this->saveFlashRedirect($language, $request);
    }

    /**
     * Remove the specified language from storage.
     *
     * @param  Language  $language
     * @return Response
     */
    public function destroy(Language $language)
    {
        $checkLang = Category::whereLanguageId($language->id)->all();
        if (count($checkLang))
        {
            Flash::error('This language already in use. Please change the languages in the Category first!');
            return Redirect::back();
        }
        return $this->destroyFlashRedirect($language);
    }

    /**
     * Change language
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChange()
    {
        session(['language' => Input::get('language')]);
        return Redirect::back();
    }
}