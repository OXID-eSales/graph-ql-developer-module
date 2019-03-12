<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQl\Service;

interface DeveloperToolsServiceInterface
{

    public function getAuthTokenString();

    public function getShopUrl();

}