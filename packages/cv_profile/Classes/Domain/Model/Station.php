<?php

declare(strict_types=1);

namespace Aistea\CvProfile\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Station extends AbstractEntity
{
    protected string $period = '';
    protected string $institution = '';
    protected string $role = '';
    protected ?string $description = '';

    public function getPeriod(): string
    {
        return $this->period;
    }

    public function setPeriod(string $period): void
    {
        $this->period = $period;
    }

    public function getInstitution(): string
    {
        return $this->institution;
    }

    public function setInstitution(string $institution): void
    {
        $this->institution = $institution;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getDescription(): string
    {
        return $this->description ?? '';
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
