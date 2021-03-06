<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$posts = new FieldsBuilder('posts');
$posts

    // Content
    ->addTab('content', ['placement' => 'left'])
        ->addWysiwyg('intro', ['label' => __('Intro', 'sage')])

    // Container options
    ->addTab('container_options', ['placement' => 'left'])
        ->addFields(get_field_partial('flexbuilder.partials.container_width'))
        ->addFields(get_field_partial('flexbuilder.partials.row_bg'))

    // Row options
    ->addTab('row_options', ['placement' => 'left'])

        // Columns amount
        ->addRadio('post_columns', [
            'label' => __('Columns', 'sage'),
            'default_value' => 'col-md-3'
        ])
            ->addChoice('col-md-6', '2')
            ->addChoice('col-md-4', '3')
            ->addChoice('col-md-3', '4')

        // Post amount
        ->addSelect('post_amount', ['label' => __('Amount', 'sage')])
            ->addChoice('2','2')
            ->addChoice('3','3')
            ->addChoice('4','4')
            ->addChoice('6','6')
            ->addChoice('8','8')
            ->addChoice('9','9')
            ->addChoice('10','10')
            ->addChoice('12','12')
            ->addChoice('16','16')
            ->setDefaultValue('4')

        // Excerpt length
        ->addNumber('excerpt_length', [
            'label' => __('Excerpt length', 'sage'),
            'placeholder' => 280,
            'min' => 100,
            'max' => 560,
        ])

        // Post type (ACF Extend plugin required!)
        ->addField('post_type', 'acfe_post_types', [
            'label' => __('Post type', 'sage'),
            'default_value' => 'post',
            'field_type' => 'select'
        ])

        // Post options
        ->addCheckbox('post_options', [
            'label' => __('Posts options', 'sage'),
            'allow_custom' => 1,
            'save_custom' => 1,
            'default_value' => [
                0 => 'show_date',
                2 => 'show_cats',
            ]
        ])
            ->addChoice('show_date', __('Show date', 'sage'))
            ->addChoice('show_author', __('Show author', 'sage'))
            ->addChoice('show_cats', __('Show categories', 'sage'))
            ->addChoice('show_more', __('Show \'More posts\' button', 'sage'))

        // More button
        ->addGroup('button')
            ->conditional('post_options', '==', 'show_more')
            ->addFields(get_field_partial('flexbuilder.components.button'))
        ->endGroup()

        // Categories
        ->addTaxonomy('post_tax', [
            'label' => __('Category', 'sage'),
            'taxonomy' => 'category',
            'field_type' => 'multi_select',
            'add_term' => 0,
        ])
            ->conditional('post_type', '==', 'post');

return $posts;
