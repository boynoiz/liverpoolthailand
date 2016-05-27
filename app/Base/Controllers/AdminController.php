<?php

namespace LTF\Base\Controllers;

use Queue;
use LTF\Category;
use LTF\Jobs\ImageResizerJob;
use LTF\Language;
use LTF\Http\Controllers\Controller;
use FormBuilder;
use Laracasts\Flash\Flash;
use Auth;

abstract class AdminController extends Controller
{
    /**
     * Model name
     *
     * @var string
     */
    protected $model = "";

    /**
     * Class name
     *
     * @var string
     */
    protected $class = "";

    /**
     * Form class path
     *
     * @var string
     */
    protected $formPath = "";

    /**
     * Current language
     *
     * @var mixed
     */
    protected $language;

    /**
     * Current user
     *
     * @var mixed
     */

    protected $user;

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->class = $this->getClass();
        $this->model = $this->getModel();
        $this->formPath = $this->getFormPath();
        $this->language = session('current_lang');
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Response
     */
    public function create()
    {
        return $this->getForm();
    }

    /**
     * Get form
     *
     * @param null $object
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getForm($object = null)
    {
        if ($object) {
            $url =  $this->urlRoutePath("update", $object);
            $method = 'PATCH';
            $path = $this->viewPath("edit");
        } else {
            $url =  $this->urlRoutePath("store", $object);
            $method = 'POST';
            $path = $this->viewPath("create");
        }
        $form = $this->createForm($url, $method, $object);
        return view($path, compact('form', 'object'));
    }

    /**
     * Create form
     *
     * @param $url
     * @param $method
     * @param $model
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function createForm($url, $method, $model)
    {
        return FormBuilder::create($this->formPath, [
            'method' => $method,
            'url' => $url,
            'model' => $model
        ], $this->getSelectList());
    }

    /**
     * Create, flash success or error then redirect
     *
     * @param $class
     * @param $request
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createFlashRedirect($request, $path = "index")
    {
        $class = $this->class;
        $model = Auth::user()->$class()->create($this->getData($request));
        $model->id ? Flash::success(trans('admin.create.success')) : Flash::error(trans('admin.create.fail'));
        return $this->redirectRoutePath($path);
    }

    /**
     * Save, flash success or error then redirect
     *
     * @param $model
     * @param $request
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveFlashRedirect($model, $request, $path = "index")
    {
        $model->fill($this->getData($request));
        $model->updated_by = Auth::user()->id;
        $model->save() ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return $this->redirectRoutePath($path);
    }

    /**
     * Get data, if image column is passed, upload it
     *
     * @param $request
     * @return mixed
     */
    public function getData($request)
    {
        if (!empty($request->image)) {
            $imageColumn = $request->image;
            $imageCategory = strtolower($this->model);

            if ($imageCategory === 'article') {
                $getImageCategory = Category::find($request->category_id);
                $imageCategory = strtolower($getImageCategory->title);
            }

            $data = $request->except($imageColumn);
            if ($request->file($imageColumn)) {
                $file = $request->file($imageColumn);
                $request->file($imageColumn);
                $fileName = rename_file($imageCategory, $file->getClientOriginalExtension());
                $path = '/assets/images/' . str_slug($imageCategory, '-') . '/';
                $move_path = public_path() . $path;
                $file->move($move_path, $fileName);
                Queue::push(ImageResizerJob::class, ['path' => $path, 'filename' => $fileName]);
                $data['image_path'] = $path;
                $data['image_name'] = $fileName;
            }
            return $data;
        }
        return $request;
    }

    /**
     * Delete and flash success or fail then redirect to path
     *
     * @param $model
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyFlashRedirect($model, $path = "index")
    {
        $model->delete() ?
            Flash::success(trans('admin.delete.success')) :
            Flash::error(trans('admin.delete.fail'));
        return $this->redirectRoutePath($path);
    }

    /**
     * Returns redirect url path, if error is passed, show it
     *
     * @param string $path
     * @param null $error
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectRoutePath($path = "index", $error = null)
    {
        if ($error) {
            Flash::error(trans($error));
        }
        return redirect($this->urlRoutePath($path));
    }

    /**
     * Returns full url
     *
     * @param string $path
     * @param bool|false $model
     * @return string
     */
    protected function urlRoutePath($path = "index", $model = false)
    {
        if ($model) {
            return route($this->routePath($path), ['id' => $model->id]);
        } else {
            return route($this->routePath($path));
        }
    }

    /**
     * Returns route path as string
     *
     * @param string $path
     * @return string
     */
    public function routePath($path = "index")
    {
        return 'admin.' . str_slug($this->model, '.') . '.' . $path;
    }

    /**
     * Returns view path for the admin
     *
     * @param string $path
     * @param bool|false $object
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function viewPath($path = "index", $object = false)
    {
        $path = 'admin.' . str_plural(snake_case($this->model))  . '.' . $path;
        if ($object !== false) {
            return view($path, compact('object'));
        } else {
            return $path;
        }
    }

    /**
     * Get select list for languages
     *
     * @return mixed
     */
    protected function getSelectList()
    {
        return Language::pluck('title', 'id')->all();
    }

    /**
     * Get model name, if isset the model parameter, then get it, if not then get the class name, strip "Controller" out
     *
     * @return string
     */
    protected function getModel()
    {
        return empty($this->model) ?
            explode('Controller', substr(strrchr(get_class($this), '\\'), 1))[0]  :
            $this->model;
    }

    /**
     * Get class name, if isset the model parameter, then get it, if not then get the class name, strip "Controller" out
     *
     * @return string
     */
    protected function getClass()
    {
        return str_plural(strtolower($this->getModel()));
    }

    /**
     * Returns fully class name for form
     *
     * @return string
     */
    protected function getFormPath()
    {
        $model =  title_case(str_plural($this->model));
        return 'LTF\Forms\Admin\\' . $model . 'Form';
    }
}
