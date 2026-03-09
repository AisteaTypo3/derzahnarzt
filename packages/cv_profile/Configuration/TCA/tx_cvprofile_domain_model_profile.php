<?php

declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'CV Profile',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'name,title_prefix,specialisation,tagline',
        'iconfile' => 'EXT:cv_profile/Resources/Public/Icons/Extension.svg',
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --div--;General,
                    hidden, name, title_prefix, specialisation, tagline, photo, show_degrees,
                --div--;Degrees,
                    degrees,
                --div--;Timeline,
                    stations,
                --div--;Highlights / Stats,
                    highlights
            ',
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
        'name' => [
            'label' => 'Name',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim',
                'required' => true,
                'max' => 255,
            ],
        ],
        'title_prefix' => [
            'label' => 'Title Prefix',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim',
                'max' => 255,
            ],
        ],
        'tagline' => [
            'label' => 'Tagline',
            'config' => [
                'type' => 'text',
                'rows' => 4,
                'cols' => 40,
            ],
        ],
        'specialisation' => [
            'label' => 'Specialisation',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'trim',
                'max' => 255,
            ],
        ],
        'photo' => [
            'label' => 'Photo',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'maxitems' => 1,
                'appearance' => [
                    'createNewRelationLinkTitle' => 'Add profile photo',
                ],
            ],
        ],
        'show_degrees' => [
            'label' => 'Abschlüsse anzeigen',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 1,
            ],
        ],
        'degrees' => [
            'label' => 'Degrees',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_cvprofile_domain_model_degree',
                'foreign_field' => 'profile',
                'foreign_sortby' => 'sorting',
                'maxitems' => 100,
                'appearance' => [
                    'collapseAll' => true,
                    'useSortable' => true,
                    'enabledControls' => [
                        'dragdrop' => true,
                        'new' => true,
                        'delete' => true,
                        'hide' => true,
                        'sort' => true,
                    ],
                ],
            ],
        ],
        'stations' => [
            'label' => 'Timeline Stations',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_cvprofile_domain_model_station',
                'foreign_field' => 'profile',
                'foreign_sortby' => 'sorting',
                'maxitems' => 100,
                'appearance' => [
                    'collapseAll' => true,
                    'useSortable' => true,
                    'enabledControls' => [
                        'dragdrop' => true,
                        'new' => true,
                        'delete' => true,
                        'hide' => true,
                        'sort' => true,
                    ],
                ],
            ],
        ],
        'highlights' => [
            'label' => 'Highlights / Stats',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_cvprofile_domain_model_highlight',
                'foreign_field' => 'profile',
                'foreign_sortby' => 'sorting',
                'maxitems' => 100,
                'appearance' => [
                    'collapseAll' => true,
                    'useSortable' => true,
                    'enabledControls' => [
                        'dragdrop' => true,
                        'new' => true,
                        'delete' => true,
                        'hide' => true,
                        'sort' => true,
                    ],
                ],
            ],
        ],
    ],
];
