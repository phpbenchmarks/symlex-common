<?php

namespace PhpBenchmarksSymlex\Kernel;

use DIMicroKernel\Kernel;

/**
 * @author Michael Mayer <michael@liquidbytes.net>
 * @license MIT
 */
class WebApp extends Kernel
{
    protected $urlPrefix = '';

    public function __construct($appPath, $debug = false)
    {
        parent::__construct('web', $appPath, $debug);
    }

    public function init()
    {
        if ($this->debug) {
            ini_set('display_errors', 1);
        }
    }

    public function getUrlPrefix($urlPrefixPostfix = ''): string
    {
        return $this->urlPrefix . $urlPrefixPostfix;
    }

    public function setUrlPrefix(string $urlPrefix)
    {
        $this->urlPrefix = $urlPrefix;
    }

    protected function setUp()
    {
        $container = $this->getContainer();

        // The error router catches errors and displays them as error pages
        $container->get('router.error')->route();

        // Routing for REST API calls
        $container->get('router.rest')->route($this->getUrlPrefix('/benchmark'), 'controller.benchmark.');
   }
}