<?php
/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @category    module
 * @package     GraphQL
 * @link        http://www.oxid-esales.com
 * @copyright   (C) OXID eSales AG 2003-2018
 * @version     OXID eSales GraphQL
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