<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Aisteacorp',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '14.0.0-14.99.99',
            'fluid_styled_content' => '14.0.0-14.99.99',
            'rte_ckeditor' => '14.0.0-14.99.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Aistea\\Aisteacorp\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Yannick Aister',
    'author_email' => 'yannick.aister@aistee.de',
    'author_company' => 'AIstea',
    'version' => '1.0.0',
];
