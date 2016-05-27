<?php

namespace LTF\Http\Controllers\Application;

use LTF\Category;
use LTF\Base\Controllers\ApplicationController;

class CategoryController extends ApplicationController
{
    /**
     * Show the category articles
     *
     * @param Category $category
     * @return Response
     */
    public function index(Category $category)
    {
        $articles = $category->articles()->published()->orderBy('published_at', 'desc')->paginate(5);
        return view('application.category.index', compact('articles', 'category'));
    }
}
