<?php

declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'CV Highlight',
        'label' => 'headline',
        'label_alt' => 'stat_label',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'headline,body,stat_label,stat_value',
        'iconfile' => 'EXT:cv_profile/Resources/Public/Icons/Extension.svg',
    ],
    'types' => [
        '1' => [
            'showitem' => 'hidden, icon, headline, body, --linebreak--, stat_value, stat_suffix, stat_label',
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
        'icon' => [
            'label' => 'Icon',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'trim',
                'max' => 10,
            ],
        ],
        'headline' => [
            'label' => 'Headline',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim,required',
                'max' => 255,
            ],
        ],
        'body' => [
            'label' => 'Body',
            'config' => [
                'type' => 'text',
                'rows' => 4,
                'cols' => 40,
                'enableRichtext' => false,
            ],
        ],
        'stat_value' => [
            'label' => 'Stat Value',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim',
                'max' => 20,
            ],
        ],
        'stat_suffix' => [
            'label' => 'Stat Suffix',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'trim',
                'max' => 10,
            ],
        ],
        'stat_label' => [
            'label' => 'Stat Label',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'max' => 100,
            ],
        ],
    ],
];
