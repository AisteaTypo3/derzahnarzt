<?php

declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'CV Station',
        'label' => 'institution',
        'label_alt' => 'role,period',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'period,institution,role,description',
        'iconfile' => 'EXT:cv_profile/Resources/Public/Icons/Extension.svg',
    ],
    'types' => [
        '1' => [
            'showitem' => 'hidden, period, institution, role, description',
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
        'period' => [
            'label' => 'Period',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'max' => 255,
            ],
        ],
        'institution' => [
            'label' => 'Institution',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim,required',
                'max' => 255,
            ],
        ],
        'role' => [
            'label' => 'Role',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim,required',
                'max' => 255,
            ],
        ],
        'description' => [
            'label' => 'Description',
            'config' => [
                'type' => 'text',
                'rows' => 4,
                'cols' => 40,
                'enableRichtext' => false,
            ],
        ],
    ],
];
