<?php

declare(strict_types=1);

namespace Aistea\CvProfile\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Degree extends AbstractEntity
{
    protected string $label = '';

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }
}
