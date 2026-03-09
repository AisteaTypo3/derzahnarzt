<?php

declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'CV Degree',
        'label' => 'label',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'label',
        'iconfile' => 'EXT:cv_profile/Resources/Public/Icons/Extension.svg',
    ],
    'types' => [
        '1' => [
            'showitem' => 'hidden, label',
        ],
    ],
    'columns' => [
        'hidden' => [
            'label' => 'Hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'profile' => [
            'config' => ['type' => 'passthrough'],
        ],
        'sorting' => [
            'config' => ['type' => 'passthrough'],
        ],
        'label' => [
            'label' => 'Label',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim,required',
                'max' => 255,
            ],
        ],
    ],
];
