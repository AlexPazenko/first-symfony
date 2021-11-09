<?php
namespace App\Services;

use App\Services\MySecondService;

class MyService
{
    public $my;
    public $logger;

    use OptionalServiceTrait;
    public function someSecondAction()
    {
        dump($this->logger);
        dump($this->my);
    }

    public function someAction()
    {
        dump($this->service->doSomething2());
    }

    /**
     * @param \App\Services\MySecondService $second_service
     * @required
     */
   /* public function setSecondService(MySecondService $second_service)
    {
        dump($second_service);
    }*/
}