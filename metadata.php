<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

use \OxidEsales\Eshop\Application\Controller\Admin\ModuleConfiguration;
use \OxidEsales\Eshop\Application\Controller\Admin\NavigationTree;


/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = [
    'id'            => 'oe/graphql-developer',
    'title'         => [
        'de'        =>  'GraphQL Entwicklerwerkzeuge',
        'en'        =>  'GraphQL developer tools',
    ],
    'description'   =>  [
        'de' => '<span>OXID GraphQL Entwicklerwerkzeuge</span>',

        'en' => '<span>OXID GraphQL developer tools</span>',
    ],
    'thumbnail'   => 'out/pictures/picture.png',
    'version'     => '0.0.1',
    'author'      => 'OXID eSales AG',
    'url'         => 'www.oxid-esales.com',
    'email'       => 'info@oxid-esales.com',
    'extend'      => [],
    'controllers' => [
        // Admin Controller
        'graphiql'      => OxidEsales\GraphQl\Controller\Admin\GraphiQL::class,
        'queries'      => OxidEsales\GraphQl\Controller\Admin\Queries::class,
        'mutations'      => OxidEsales\GraphQl\Controller\Admin\Mutations::class
    ],
    'templates'   => [
        //Admin Template
        'graphiql.tpl'    =>  'oe/graphql-developer/views/admin/tpl/graphiql.tpl',
        'voyager.tpl'    =>  'oe/graphql-developer/views/admin/tpl/voyager.tpl',
    ],
    'blocks'      => [],
    'settings'    => [],
    'events'      => []
];