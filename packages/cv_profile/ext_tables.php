<?php

declare(strict_types=1);

defined('TYPO3') or die();

(static function (): void {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'cv_profile',
        'Configuration/TypoScript',
        'CV Profil'
    );

    // Intentionally left minimal.
    // Plugin registration is handled in Configuration/TCA/Overrides/tt_content.php
    // so registerPlugin() can reliably detect the CType pluginType from configurePlugin().
})();
