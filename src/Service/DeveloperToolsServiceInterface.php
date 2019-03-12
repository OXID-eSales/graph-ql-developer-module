<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 12.03.19
 * Time: 11:27
 */

namespace OxidEsales\GraphQl\Service;

interface DeveloperToolsServiceInterface
{

    public function getAuthTokenString();

    public function getShopUrl();

}