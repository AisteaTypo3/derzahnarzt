<?php

declare(strict_types=1);

namespace Aistea\CvProfile\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

final class CountUpViewHelper extends AbstractViewHelper
{
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('value', 'mixed', 'Numeric value to format', true);
        $this->registerArgument('suffix', 'string', 'Optional suffix', false, '');
    }

    public function render(): string
    {
        $rawValue = (string)$this->arguments['value'];
        $suffix = (string)$this->arguments['suffix'];

        if ($rawValue === '') {
            return '';
        }

        $normalized = str_replace([',', ' '], '', $rawValue);
        if (!is_numeric($normalized)) {
            return $rawValue . $suffix;
        }

        $number = (float)$normalized;
        $decimals = str_contains($normalized, '.') ? 1 : 0;
        $formatted = number_format($number, $decimals, '.', $decimals === 0 ? '' : ',');

        return $formatted . $suffix;
    }
}
