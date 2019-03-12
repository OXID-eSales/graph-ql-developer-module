<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */


namespace OxidEsales\GraphQl\Controller\Admin;

use OxidEsales\EshopCommunity\Internal\Application\ContainerFactory;

use OxidEsales\GraphQl\DataObject\TokenRequest;
use OxidEsales\GraphQl\Service\AuthenticationServiceInterface;
use OxidEsales\GraphQl\Service\DeveloperToolsServiceInterface;
use OxidEsales\GraphQl\Service\KeyRegistryInterface;
use OxidEsales\GraphQl\Utility\AuthConstants;

/**
 * GraphiQL Admin Tool
 */
class GraphiQL extends \OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController
{
    /**
     * Template to render
     *
     * @var string
     */
    protected $_sThisTemplate = 'graphiql.tpl';

    /**
     * Render
     *
     * @return string
     */
    public function render()
    {
        parent::render();

        $container = ContainerFactory::getInstance()->getContainer();
        /** @var DeveloperToolsServiceInterface $authService */
        $authService = $container->get(DeveloperToolsServiceInterface::class);
        $this->_aViewData["bearer"] = $authService->getAuthTokenString();
        $this->_aViewData["shopurl"] = $authService->getShopUrl();

        return $this->_sThisTemplate;
    }

}