<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQL\Developer\Service;

use Lcobucci\JWT\Token;
use OxidEsales\GraphQL\Base\Service\Authentication;

class DeveloperAuthenticationService extends Authentication implements DeveloperAuthenticationServiceInterface
{

    const DEVELOPER_GROUP = 'developer';

    public function createDeveloperToken(): Token
    {
        $getTokenBuilder = new \ReflectionMethod(__CLASS__, 'getTokenBuilder');
        $getTokenBuilder->setAccessible(true);

        $getSigner = new \ReflectionMethod(__CLASS__, 'getSigner');
        $getSigner->setAccessible(true);

        $getSignatureKey = new \ReflectionMethod(__CLASS__, 'getSignatureKey');
        $getSignatureKey->setAccessible(true);

        $tokenBuilder = $getTokenBuilder->invoke($this);
        $tokenBuilder->withClaim(Authentication::CLAIM_GROUP, self::DEVELOPER_GROUP);
        return $tokenBuilder->getToken(
            $getSigner->invoke($this),
            $getSignatureKey->invoke($this)
        );
    }
}
