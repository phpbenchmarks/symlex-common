<?php

namespace PhpBenchmarksSymlex\Controller;

use PhpBenchmarksRestData\Service;
use PhpBenchmarksSymlex\EventListener\DefineLocaleEventListener;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Serializer\Serializer;

/**
 * @see https://github.com/symlex/symlex#rest
 */
class BenchmarkController
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

    public function getAction()
    {
        $this->eventDispatcher->dispatch(DefineLocaleEventListener::EVENT_NAME);

        $users = Service::getUsers();

        $result = $this->serializer->normalize($users);

        return $result;
    }
}
