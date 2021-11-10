<?php
namespace App\Services;

use App\Services\MySecondService;
use Doctrine\ORM\Event\PostFlushEventArgs;

class MyService
{
    /*public $my;
    public $logger;

    use OptionalServiceTrait;*/
    /*public function __construct($service)
    {
        dump($service);
        $this->secService = $service;
    }*/

    public function __construct()
    {
        dump('sdafsd');
    }

    public function postFlush(PostFlushEventArgs $args)
    {
        dump('hello');
        dump($args);
    }

    public function clear()
    {
        dump('clear ...');
    }

    /*public function someSecondAction()
    {
        dump($this->logger);
        dump($this->my);
    }

    public function someAction()
    {
        dump($this->service->doSomething2());
    }*/

    /**
     * @param \App\Services\MySecondService $second_service
     * @required
     */
   /* public function setSecondService(MySecondService $second_service)
    {
        dump($second_service);
    }*/
}