<?php

namespace LTF\Forms\Admin;

use Kris\LaravelFormBuilder\Form;

class FootballCompForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Competition Name*'
            ])
            ->add('logo', 'file', [
                'label' => 'Competition Logo'
            ])
            ->add('save', 'submit', [
                'label' => trans('admin.fields.save'),
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->add('clear', 'reset', [
                'label' => trans('admin.fields.reset'),
                'attr' => ['class' => 'btn btn-warning']
            ]);
    }
}
