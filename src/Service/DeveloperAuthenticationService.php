<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQL\Developer\Service;

use Lcobucci\JWT\Token;
use OxidEsales\GraphQL\Base\Service\AuthenticationService;

class DeveloperAuthenticationService extends AuthenticationService implements DeveloperAuthenticationServiceInterface
{

    const DEVELOPER_GROUP = 'developer';

    public function createDeveloperToken(): Token
    {
        $tokenBuilder = $this->getTokenBuilder();
        $tokenBuilder->withClaim(AuthenticationService::CLAIM_GROUP, self::DEVELOPER_GROUP);
        return $tokenBuilder->getToken(
            $this->getSigner(),
            $this->getSignatureKey()
        );
    }
}