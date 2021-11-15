<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Security\Http\Event\SwitchUserEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Response;

class VideoCreatedSubscriber implements EventSubscriberInterface
{
    public function onSecuritySwitchUser(SwitchUserEvent $event)
    {
        // ...
    }

    public function onKernelResponse1(FilterResponseEvent $event)
    {
        $response = new Response('dupa1');
        /*$event->setResponse($response);*/
        dump('1');
    }
    public function onKernelResponse2(FilterResponseEvent $event)
    {
        $response = new Response('dupa2');
        /*$event->setResponse($response);*/
        dump('2');
    }

    public static function getSubscribedEvents()
    {
        return [
         /*   'security.switch_user' => 'onSecuritySwitchUser',
            KernelEvents::RESPONSE => [
                ['onKernelResponse1', 2],
                ['onKernelResponse2', 1],
            ],*/
        ];
    }
}
