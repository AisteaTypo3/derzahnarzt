<?php

declare(strict_types=1);

namespace Aistea\CvProfile\Tests\Unit\Domain\Model;

use Aistea\CvProfile\Domain\Model\Profile;
use Aistea\CvProfile\Domain\Model\Station;
use PHPUnit\Framework\TestCase;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

final class ProfileTest extends TestCase
{
    public function testGettersReturnAssignedValues(): void
    {
        $profile = new Profile();
        $profile->setName('Dr. Jane Doe');
        $profile->setTitlePrefix('Dr. med.');
        $profile->setTagline('Experienced oral surgeon focused on minimally invasive treatment.');

        self::assertSame('Dr. Jane Doe', $profile->getName());
        self::assertSame('Dr. med.', $profile->getTitlePrefix());
        self::assertSame(
            'Experienced oral surgeon focused on minimally invasive treatment.',
            $profile->getTagline()
        );
    }

    public function testStationsReturnsObjectStorage(): void
    {
        $profile = new Profile();

        self::assertInstanceOf(ObjectStorage::class, $profile->getStations());
    }

    public function testAddStationIncreasesCountByOne(): void
    {
        $profile = new Profile();
        $station = new Station();

        $before = $profile->getStations()->count();
        $profile->addStation($station);

        self::assertSame($before + 1, $profile->getStations()->count());
    }
}
