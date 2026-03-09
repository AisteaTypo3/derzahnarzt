<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'CV Profile',
    'description' => 'Animated CV/profile page for medical professionals and experts',
    'category' => 'plugin',
    'author' => 'Aistea',
    'author_email' => '',
    'author_company' => 'Aistea',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.0.0-14.99.99',
            'php' => '8.2.0-8.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
