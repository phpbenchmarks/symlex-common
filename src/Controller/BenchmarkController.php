<?php

namespace PhpBenchmarksSymlex\Controller;

use PhpBenchmarksRestData\Service;
use Symfony\Component\Serializer\Serializer;

/**
 * @see https://github.com/symlex/symlex#rest
 */
class BenchmarkController
{
    protected $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function getAction()
    {
        $users = Service::getUsers();

        $result = $this->serializer->normalize($users);

        return $result;
    }
}
