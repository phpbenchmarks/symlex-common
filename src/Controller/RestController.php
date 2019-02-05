<?php

namespace PhpBenchmarksSymlex\Controller;

use PhpBenchmarksRestData\Service;
use PhpBenchmarksSymlex\EventListener\DefineLocaleEventListener;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Serializer\Serializer;

/**
 * @see https://docs.symlex.org/en/latest/framework/rest/
 */
class RestController
{
    /** @var Serializer */
    protected $serializer;

    /** @var EventDispatcher */
    protected $eventDispatcher;

    public function __construct(Serializer $serializer, EventDispatcher $eventDispatcher)
    {
        $this->serializer = $serializer;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function cgetAction()
    {
        $this->eventDispatcher->dispatch(DefineLocaleEventListener::EVENT_NAME);

        $users = Service::getUsers();

        $result = $this->serializer->normalize($users);

        return $result;
    }

    /** Not needed for benchmark, but by wget when we compare response body to expected one */
    public function cheadAction()
    {
        return $this->cgetAction();
    }
}
