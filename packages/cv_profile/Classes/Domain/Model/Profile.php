<?php

declare(strict_types=1);

namespace Aistea\CvProfile\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Profile extends AbstractEntity
{
    protected string $name = '';
    protected string $titlePrefix = '';
    protected ?string $tagline = '';
    protected string $specialisation = '';
    protected bool $showDegrees = true;

    /** @var ObjectStorage<FileReference> */
    protected ObjectStorage $photo;

    /** @var ObjectStorage<Degree> */
    protected ObjectStorage $degrees;

    /** @var ObjectStorage<Station> */
    protected ObjectStorage $stations;

    /** @var ObjectStorage<Highlight> */
    protected ObjectStorage $highlights;

    public function __construct()
    {
        $this->initializeObjectStorage();
    }

    public function initializeObject(): void
    {
        $this->initializeObjectStorage();
    }

    protected function initializeObjectStorage(): void
    {
        if (!isset($this->photo) || !$this->photo instanceof ObjectStorage) {
            $this->photo = new ObjectStorage();
        }
        if (!isset($this->degrees) || !$this->degrees instanceof ObjectStorage) {
            $this->degrees = new ObjectStorage();
        }
        if (!isset($this->stations) || !$this->stations instanceof ObjectStorage) {
            $this->stations = new ObjectStorage();
        }
        if (!isset($this->highlights) || !$this->highlights instanceof ObjectStorage) {
            $this->highlights = new ObjectStorage();
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTitlePrefix(): string
    {
        return $this->titlePrefix;
    }

    public function setTitlePrefix(string $titlePrefix): void
    {
        $this->titlePrefix = $titlePrefix;
    }

    public function getTagline(): string
    {
        return $this->tagline ?? '';
    }

    public function setTagline(?string $tagline): void
    {
        $this->tagline = $tagline;
    }

    public function getSpecialisation(): string
    {
        return $this->specialisation;
    }

    public function setSpecialisation(string $specialisation): void
    {
        $this->specialisation = $specialisation;
    }

    public function isShowDegrees(): bool
    {
        return $this->showDegrees;
    }

    public function getShowDegrees(): bool
    {
        return $this->showDegrees;
    }

    public function setShowDegrees(bool $showDegrees): void
    {
        $this->showDegrees = $showDegrees;
    }

    public function getPhoto(): ?FileReference
    {
        foreach ($this->photo as $fileReference) {
            if ($fileReference instanceof FileReference) {
                return $fileReference;
            }
        }

        return null;
    }

    /**
     * @return ObjectStorage<FileReference>
     */
    public function getPhotoCollection(): ObjectStorage
    {
        return $this->photo;
    }

    /**
     * @param ObjectStorage<FileReference> $photo
     */
    public function setPhoto(ObjectStorage $photo): void
    {
        $this->photo = $photo;
    }

    /** @return ObjectStorage<Degree> */
    public function getDegrees(): ObjectStorage
    {
        return $this->degrees;
    }

    /** @param ObjectStorage<Degree> $degrees */
    public function setDegrees(ObjectStorage $degrees): void
    {
        $this->degrees = $degrees;
    }

    public function addDegree(Degree $degree): void
    {
        $this->degrees->attach($degree);
    }

    public function removeDegree(Degree $degree): void
    {
        $this->degrees->detach($degree);
    }

    /** @return ObjectStorage<Station> */
    public function getStations(): ObjectStorage
    {
        return $this->stations;
    }

    /** @param ObjectStorage<Station> $stations */
    public function setStations(ObjectStorage $stations): void
    {
        $this->stations = $stations;
    }

    public function addStation(Station $station): void
    {
        $this->stations->attach($station);
    }

    public function removeStation(Station $station): void
    {
        $this->stations->detach($station);
    }

    /** @return ObjectStorage<Highlight> */
    public function getHighlights(): ObjectStorage
    {
        return $this->highlights;
    }

    /** @param ObjectStorage<Highlight> $highlights */
    public function setHighlights(ObjectStorage $highlights): void
    {
        $this->highlights = $highlights;
    }

    public function addHighlight(Highlight $highlight): void
    {
        $this->highlights->attach($highlight);
    }

    public function removeHighlight(Highlight $highlight): void
    {
        $this->highlights->detach($highlight);
    }
}
