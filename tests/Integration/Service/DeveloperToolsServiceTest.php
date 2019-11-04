<?php declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQL\Tests\Integration\Service;


use OxidEsales\EshopCommunity\Tests\Integration\Internal\TestContainerFactory;
use OxidEsales\GraphQl\DataObject\Token;
use OxidEsales\GraphQL\Service\AuthorizationServiceInterface;
use OxidEsales\GraphQl\Service\DeveloperToolsServiceInterface;
use OxidEsales\GraphQl\Service\KeyRegistryInterface;
use OxidEsales\GraphQl\Service\PermissionsServiceInterface;
use OxidEsales\TestingLibrary\UnitTestCase;
use Symfony\Component\DependencyInjection\Container;

class DeveloperToolsServiceTest extends UnitTestCase
{
    /** @var  Container $container */
    private $container;

    public function setUp()
    {
        $containerFactory = new TestContainerFactory();
        $this->container = $containerFactory->create();
        $this->container->compile();
    }

    public function testDeveloperPermissions()
    {
        /** @var DeveloperToolsServiceInterface $developerToolsService */
        $developerToolsService = $this->container->get(DeveloperToolsServiceInterface::class);
        $tokenString = $developerToolsService->getAuthTokenString();
        $token = new Parser
        $authorizationService = $this->container->get(AuthorizationServiceInterface::class);
        $authorizationService->setToken($tokenString);

        /** @var KeyRegistryInterface $keyRegistry */
        $keyRegistry = $this->container->get(KeyRegistryInterface::class);
        $tokenString = $developerToolsService->getAuthTokenString();
        $token = new Token();
        $key = $keyRegistry->getSignatureKey();
        $token->setJwt($tokenString, $key);

        /** @var PermissionsServiceInterface $permissionsService */
        $permissionsService = $this->container->get(PermissionsServiceInterface::class);

        $permissionsService->checkPermission($token, "thisshouldallowanypermission");

        $this->assertTrue('NoExceptionThrown' == 'NoExceptionThrown');
    }

    public function testDeveloperShopurl()
    {
        /** @var DeveloperToolsServiceInterface $developerToolsService */
        $developerToolsService = $this->container->get(DeveloperToolsServiceInterface::class);
        $this->assertTrue(strlen($developerToolsService->getShopUrl()) > 0);
    }
}
