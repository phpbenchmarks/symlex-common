<?php

namespace PhpBenchmarksSymlex\EventListener;

use Symfony\Component\Translation\TranslatorInterface;

class DefineLocaleEventListener
{
    const EVENT_NAME = 'defineLocale';

    /** @var TranslatorInterface */
    protected $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function onDefineLocale()
    {
        $locales = ['fr_FR', 'en_GB', 'aa_BB'];
        $locale = $locales[rand(0, 2)];

        $this->translator->setLocale($locale);
    }
}
