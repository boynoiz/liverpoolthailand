<?php

namespace LTF\Http\Controllers\Admin;

use LTF\Category;
use LTF\Base\Controllers\AdminController;
use LTF\Http\Controllers\Api\DataTables\CategoryDataTable;
use LTF\Http\Requests\Admin\CategoryRequest;

/**
 * Class CategoryController
 * @package LTF\Http\Controllers\Admin
 *
 */
class CategoryController extends AdminController
{

    /**
     * Image column of the model
     *
     * @var string
     */
    private $imageColumn = "image";

    /**
     * @var string
     */
    private $categories = "categories";


    /**
     * Display a listing of the categories.
     *
     * @param CategoryDataTable $dataTable
     * @return Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render($this->viewPath());
    }

    /**
     * Store a newly created category in storage
     *
     * @param CategoryRequest $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $request->image = $this->imageColumn;
        $categories = $this->categories;
        return $this->createFlashRedirect($categories, $request);
    }

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return $this->viewPath("show", $category);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        return $this->getForm($category);
    }

    /**
     * Update the specified category in storage.
     *
     * @param Category $category
     * @param CategoryRequest $request
     * @return Response
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $request->image = $this->imageColumn;
        return $this->saveFlashRedirect($category, $request);
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  Category  $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        return $this->destroyFlashRedirect($category);
    }
}