<?php

namespace PhpBenchmarksSymlex\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @see https://docs.symlex.org/en/latest/framework/rest/
 */
class TestController
{
    public function cgetAction(Request $request)
    {
        return array('request' => $request->query->all());
    }
}