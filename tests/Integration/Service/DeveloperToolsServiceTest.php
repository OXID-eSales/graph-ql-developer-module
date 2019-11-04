<?php declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQL\Developer\Tests\Integration\Service;


use Lcobucci\JWT\Parser;
use OxidEsales\EshopCommunity\Tests\Integration\Internal\TestContainerFactory;
use OxidEsales\GraphQL\Base\Service\AuthorizationServiceInterface;
use OxidEsales\GraphQl\DataObject\Token;
use OxidEsales\GraphQL\Developer\Service\DeveloperToolsServiceInterface;
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
        $token = (new Parser())->parse($tokenString);

        $authorizationService = $this->container->get(AuthorizationServiceInterface::class);
        $authorizationService->setToken($token);

        $this->assertTrue($authorizationService->isAllowed('anyright'));

    }

    public function testDeveloperShopurl()
    {
        /** @var DeveloperToolsServiceInterface $developerToolsService */
        $developerToolsService = $this->container->get(DeveloperToolsServiceInterface::class);
        $this->assertTrue(strlen($developerToolsService->getShopUrl()) > 0);
    }
}
