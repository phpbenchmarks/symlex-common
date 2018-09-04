<?php

namespace PhpBenchmarksSymlex\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * @see https://github.com/symlex/symlex#controllers
 */
class BenchmarkController
{
    public function helloworldAction()
    {
        return new Response('Hello World !');
    }
}