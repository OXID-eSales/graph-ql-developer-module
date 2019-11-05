<?php declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQL\Developer\Service;

use OxidEsales\GraphQL\Base\Service\LegacyServiceInterface;

class DeveloperToolsService implements DeveloperToolsServiceInterface
{

    /** @var DeveloperAuthenticationServiceInterface  */
    private $authService;

    /** @var LegacyServiceInterface */
    private $legacyService;

    public function __construct(
        DeveloperAuthenticationServiceInterface $authService,
        LegacyServiceInterface $legacyService)
    {
        $this->authService = $authService;
        $this->legacyService = $legacyService;
    }

    public function getAuthTokenString()
    {
        return $this->authService->createDeveloperToken();

    }

    public function getShopUrl()
    {
        return $this->legacyService->getShopUrl();
    }
}
