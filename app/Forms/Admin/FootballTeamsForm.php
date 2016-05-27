<?php

namespace LTF\Forms\Admin;

use Kris\LaravelFormBuilder\Form;

class FootballTeamsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Team Name*'
            ])
            ->add('shortname', 'text', [
                'label' => 'Short Name'
            ])
            ->add('country', 'text', [
                'label' => 'Country*'
            ])
            ->add('founded', 'text', [
                'label' => 'Founded*'
            ])
            ->add('leagues', 'text', [
                'label' => 'In Competition*'
            ])
            ->add('venue_name', 'text', [
                'label' => 'Venue Name*'
            ])
            ->add('venue_city', 'text', [
                'label' => 'Venue City*'
            ])
            ->add('venue_capacity', 'text', [
                'label' => 'Venue Capacity*'
            ])
            ->add('coach_name', 'text', [
                'label' => 'Manager Name*'
            ])
            ->add('logo', 'file', [
                'label' => 'Team Logo'
            ])
            ->add('detail', 'textarea', [
                'label' => 'Team Detail'
            ])
            ->add('_save', 'submit', [
                'label' => trans('admin.fields.save'),
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->add('_clear', 'reset', [
                'label' => trans('admin.fields.reset'),
                'attr' => ['class' => 'btn btn-warning']
            ]);
    }
}
