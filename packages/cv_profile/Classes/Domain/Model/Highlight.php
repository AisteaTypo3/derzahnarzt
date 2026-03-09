<?php

declare(strict_types=1);

namespace Aistea\CvProfile\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Highlight extends AbstractEntity
{
    protected string $icon = '';
    protected string $headline = '';
    protected ?string $body = '';
    protected string $statValue = '';
    protected string $statSuffix = '';
    protected string $statLabel = '';

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    public function getHeadline(): string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): void
    {
        $this->headline = $headline;
    }

    public function getBody(): string
    {
        return $this->body ?? '';
    }

    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    public function getStatValue(): string
    {
        return $this->statValue;
    }

    public function setStatValue(string $statValue): void
    {
        $this->statValue = $statValue;
    }

    public function getStatSuffix(): string
    {
        return $this->statSuffix;
    }

    public function setStatSuffix(string $statSuffix): void
    {
        $this->statSuffix = $statSuffix;
    }

    public function getStatLabel(): string
    {
        return $this->statLabel;
    }

    public function setStatLabel(string $statLabel): void
    {
        $this->statLabel = $statLabel;
    }
}
