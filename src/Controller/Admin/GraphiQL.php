<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */


namespace OxidEsales\GraphQL\Controller\Admin;

use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\GraphQl\Service\DeveloperToolsServiceInterface;

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
        /** @var DeveloperToolsServiceInterface $developerToolsService */
        $developerToolsService = $container->get(DeveloperToolsServiceInterface::class);
        $this->_aViewData["bearer"] = $developerToolsService->getAuthTokenString();
        $this->_aViewData["shopurl"] = $developerToolsService->getShopUrl();

        return $this->_sThisTemplate;
    }

}