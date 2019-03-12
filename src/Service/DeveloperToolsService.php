<?php declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQl\Service;

use OxidEsales\GraphQl\DataObject\TokenRequest;
use OxidEsales\GraphQl\Utility\AuthConstants;

class DeveloperToolsService implements DeveloperToolsServiceInterface
{

    /** @var AuthenticationServiceInterface  */
    private $authService;
    /** @var EnvironmentServiceInterface  */
    private $envService;
    /** @var KeyRegistryInterface  */
    private $keyRegistry;

    public function __construct(
        AuthenticationServiceInterface $authService,
        EnvironmentServiceInterface $envService,
        KeyRegistryInterface $keyRegistry)
    {
        $this->authService = $authService;
        $this->envService = $envService;
        $this->keyRegistry = $keyRegistry;

    }

    public function getAuthTokenString()
    {
        $tokenRequest = new TokenRequest();
        $tokenRequest->setGroup(AuthConstants::USER_GROUP_DEVELOPER);
        $tokenRequest->setLang($this->envService->getDefaultLanguage());
        $tokenRequest->setShopid($this->envService->getDefaultShopId());

        $token = $this->authService->getToken($tokenRequest);
        return $token->getJwt($this->keyRegistry->getSignatureKey());

    }

    public function getShopUrl()
    {
        return $this->envService->getShopUrl();
    }
}
