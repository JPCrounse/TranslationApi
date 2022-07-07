<?php

namespace App\Classes\Factories;

use App\Classes\Helper\TextHelper;
use App\Classes\Services\LanguageService;
use App\Interfaces\TranslationInterface;

class LanguageFactory
{
    private LanguageService $service;

    public function __construct()
    {
        $this->service = new LanguageService(config('language'));
    }

    public function getLanguage(string $name, TextHelper $text): ?TranslationInterface
    {
        $class = $this->service->findLanguage($name);
        return $class ? new $class($text, config("language.$name.valid_words", [])) : null;
    }
}
