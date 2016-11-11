<?php

namespace App\Forms\Admin;

use App\Base\Forms\AdminForm;

class ArticlesForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'label' => trans('admin.fields.article.title')
            ])
            ->add('category_id', 'choice', [
                'choices' => $this->data,
                'label' => trans('admin.fields.article.category_id')
            ])
            ->add('content', 'textarea', [
                'label' => trans('admin.fields.article.content')
            ])
            ->add('image', 'file', [
                'label' => trans('admin.fields.article.image'),
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ]
            ])
            ->add('published_at', 'date', [
                'label' => trans('admin.fields.published_at'),
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ]
            ]);
        $this->addButtons();
    }
}
