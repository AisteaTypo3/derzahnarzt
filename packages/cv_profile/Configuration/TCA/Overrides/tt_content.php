<?php

declare(strict_types=1);

defined('TYPO3') or die();

(static function (): void {
    $cType = \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'CvProfile',
        'CvShow',
        'CV Profil',
        'cv-profile-plugin'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:cv_profile/Configuration/FlexForms/CvPlugin.xml',
        $cType
    );
    // Register exact match as well for CType-based plugins to avoid DS lookup edge cases.
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        $cType,
        'FILE:EXT:cv_profile/Configuration/FlexForms/CvPlugin.xml',
        $cType
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        '--div--;Configuration,pi_flexform',
        $cType,
        'after:header'
    );
})();
