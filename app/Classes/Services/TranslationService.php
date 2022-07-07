<?php

namespace App\Classes\Services;

use App\Classes\Factories\LanguageFactory;
use App\Classes\Helper\TextHelper;

class TranslationService
{
    public function __construct(private readonly LanguageFactory $factory) {}

    public function translate(string $target, TextHelper $text, bool $isDrunk = false): string
    {
        $textObject = $this->factory
            ->getLanguage($target, $text)
            ->translate()
            ->getText();

        if($isDrunk) $textObject = $this->factory
            ->getLanguage('drunk', $textObject)
            ->translate()
            ->getText();

        return $textObject->output();
    }

    public function validateSource(string $source, TextHelper $text): bool
    {
        $sourceLanguage = $this->factory->getLanguage($source, $text);
        return !empty($sourceLanguage) && $sourceLanguage->validate();
    }

    public function detectSource(TextHelper $text): array
    {
        $matches = [];
        foreach(array_keys(config('language')) as $source)
        {
            if($this->validateSource($source, $text)) $matches[] = $source;
        }
        return $matches;
    }
}
