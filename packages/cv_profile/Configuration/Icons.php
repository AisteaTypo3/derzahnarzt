<?php

declare(strict_types=1);

return [
    'cv-profile-extension' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:cv_profile/ext_icon.svg',
    ],
    'cv-profile-plugin' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:cv_profile/Resources/Public/Icons/Plugin.svg',
    ],
    'cv-profile-record' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:cv_profile/Resources/Public/Icons/Extension.svg',
    ],
];
