<?php

namespace LTF\Forms\Admin;

use LTF\Base\Forms\AdminForm;

class CategoriesForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('language_id', 'choice', [
                'choices' => $this->data,
                'label' => trans('admin.fields.category.language_id')
            ])
            ->add('title', 'text', [
                'label' => trans('admin.fields.category.title')
            ])
            ->add('description', 'text', [
                'label' => trans('admin.fields.category.description')
            ])
            ->add('image', 'file', [
                'label' => trans('admin.fields.article.image'),
            ]);
        parent::buildForm();
    }
}
