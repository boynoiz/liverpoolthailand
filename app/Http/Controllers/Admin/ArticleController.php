<?php

namespace LTF\Http\Controllers\Admin;

use LTF\Article;
use LTF\Base\Controllers\AdminController;
use LTF\Http\Controllers\Api\DataTables\ArticleDataTable;
use LTF\Http\Requests\Admin\ArticleRequest;

class ArticleController extends AdminController
{

    /**
     * Image column of the model
     *
     * @var string
     */
    private $imageColumn = "image";

    /**
     * Display a listing of the articles.
     *
     * @param ArticleDataTable $dataTable
     * @return Response
     */
    public function index(ArticleDataTable $dataTable)
    {
        return $dataTable->render($this->viewPath());
    }

    /**
     * Store a newly created article in storage
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        return $this->createFlashRedirect(Article::class, $request, $this->imageColumn);
    }

    /**
     * Display the specified article.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return $this->viewPath("show", $article);
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        return $this->getForm($article);
    }

    /**
     * Update the specified article in storage.
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return Response
     */
    public function update(Article $article, ArticleRequest $request)
    {
        return $this->saveFlashRedirect($article, $request, $this->imageColumn);
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  Article  $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        return $this->destroyFlashRedirect($article);
    }

    /**
     * Get select list for categories
     *
     * @return mixed
     */
    protected function getSelectList()
    {
        return $this->language->categories->pluck('title', 'id')->all();
    }
}
