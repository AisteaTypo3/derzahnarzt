<?php

declare(strict_types=1);

defined('TYPO3') or die();

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'CvProfile',
        'CvShow',
        [
            \Aistea\CvProfile\Controller\CvController::class => 'show',
        ],
        [],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants(
        "@import 'EXT:cv_profile/Configuration/TypoScript/constants.typoscript'"
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
        "@import 'EXT:cv_profile/Configuration/TypoScript/setup.typoscript'"
    );
})();
