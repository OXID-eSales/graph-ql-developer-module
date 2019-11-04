<?php declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQL\Controller\Admin;

class Mutations extends Voyager
{
    public function __construct()
    {
        parent::__construct();
        $this->rootType = 'mutation';
    }

}
