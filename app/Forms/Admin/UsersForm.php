<?php

namespace App\Forms\Admin;

use App\Base\Forms\AdminForm;

class UsersForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => trans('admin.fields.user.name')
            ])
            ->add('email', 'email', [
                'label' => trans('admin.fields.user.email')
            ])
            ->add('password', 'repeated', [
                'type'              => 'password',
                'second_name'       => 'password_confirmation',
                'first_options'     => [
                    'label'         => trans('admin.fields.user.password'),
                    'attr'          => ['placeholder' => 'Enter Password']
                ],
                'second_options'    => [
                    'label'         => trans('admin.fields.user.password_confirmation'),
                    'attr'          => ['placeholder' => 'Repeat Password']
                ]
            ])
            ->add('picture', 'file', [
                'label' => trans('admin.fields.user.picture'),
                'attr' => ['class' => '']
            ]);
        $this->addButtons();
    }
}
