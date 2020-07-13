<?php declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQL\Developer\Service;

use OxidEsales\GraphQL\Base\Service\Legacy;

class DeveloperToolsService implements DeveloperToolsServiceInterface
{

    /** @var DeveloperAuthenticationServiceInterface  */
    private $authService;

    /** @var Legacy */
    private $legacyService;

    public function __construct(
        DeveloperAuthenticationServiceInterface $authService,
        Legacy $legacyService)
    {
        $this->authService = $authService;
        $this->legacyService = $legacyService;
    }

    public function getAuthTokenString()
    {
        return (string) $this->authService->createDeveloperToken();

    }

    public function getShopUrl()
    {
        return $this->legacyService->getShopUrl();
    }
}
