<?php

declare(strict_types=1);

namespace Aistea\CvProfile\Domain\Repository;

use Aistea\CvProfile\Domain\Model\Profile;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

final class ProfileRepository extends Repository
{
    public function initializeObject(): void
    {
        /** @var Typo3QuerySettings $querySettings */
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function findFirst(): ?Profile
    {
        $query = $this->createQuery();
        $query->setOrderings([
            'uid' => QueryInterface::ORDER_ASCENDING,
        ]);
        $query->setLimit(1);

        /** @var Profile|null $profile */
        $profile = $query->execute()->getFirst();

        return $profile;
    }
}
