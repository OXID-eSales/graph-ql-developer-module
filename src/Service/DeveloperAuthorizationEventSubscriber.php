<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\GraphQL\Developer\Service;

use OxidEsales\GraphQL\Base\Event\BeforeAuthorizationEvent;
use OxidEsales\GraphQL\Base\Service\AuthenticationService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DeveloperAuthorizationEventSubscriber implements EventSubscriberInterface
{
    public function handleDeveloperAuthorization(BeforeAuthorizationEvent $event) {

        $token = $event->getToken();
        if ($token->getClaim(AuthenticationService::CLAIM_GROUP) == DeveloperAuthenticationService::DEVELOPER_GROUP) {
            $event->setAuthorized(true);
            $event->stopPropagation();
        }
        return $event;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * ['eventName' => 'methodName']
     *  * ['eventName' => ['methodName', $priority]]
     *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [BeforeAuthorizationEvent::NAME => 'handleDeveloperAuthorization'];
    }
}