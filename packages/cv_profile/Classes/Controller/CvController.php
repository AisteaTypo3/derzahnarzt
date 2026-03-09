<?php

declare(strict_types=1);

namespace Aistea\CvProfile\Controller;

use Aistea\CvProfile\Domain\Repository\ProfileRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

final class CvController extends ActionController
{
    public function __construct(
        private readonly ProfileRepository $profileRepository
    ) {
    }

    public function showAction(): ResponseInterface
    {
        $uid = (int)($this->settings['profileUid'] ?? 0);

        $profile = $uid > 0
            ? $this->profileRepository->findByUid($uid)
            : $this->profileRepository->findFirst();

        $this->view->assign('profile', $profile);

        return $this->htmlResponse();
    }
}
