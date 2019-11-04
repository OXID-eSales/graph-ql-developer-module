<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */


namespace OxidEsales\GraphQL\Developer\Controller\Admin;

use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\GraphQl\Developer\Service\DeveloperToolsServiceInterface;

/**
 * Voyager Admin Tool
 */
class Voyager extends \OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController
{
    /**
     * Template to render
     *
     * @var string
     */
    protected $_sThisTemplate = 'voyager.tpl';

    protected $rootType = '';
    /**
     * Render
     *
     * @return string
     */
    public function render()
    {
        parent::render();

        $container = ContainerFactory::getInstance()->getContainer();
        /** @var DeveloperToolsServiceInterface $devToolsService */
        $devToolsService = $container->get(DeveloperToolsServiceInterface::class);
        $this->_aViewData["bearer"] = $devToolsService->getAuthTokenString();
        $this->_aViewData["shopurl"] = $devToolsService->getShopUrl();
        $this->_aViewData["roottype"] = $this->rootType;

        return $this->_sThisTemplate;
    }

}