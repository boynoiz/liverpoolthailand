<?php

namespace LTF\Forms\Admin;

use LTF\Base\Forms\AdminForm;

class ArticlesForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'label' => trans('admin.fields.article.title')
            ])
            ->add('description', 'text', [
                'label' => trans('admin.fields.article.description')
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
                'attr' => ['class' => '']
            ])
            ->add('published_at', 'date', [
                'label' => trans('admin.fields.published_at')
            ]);
        parent::buildForm();
    }
}