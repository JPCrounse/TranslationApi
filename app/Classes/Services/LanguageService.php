<?php

namespace App\Classes\Services;

use App\Classes\Helper\TextHelper;

class LanguageService
{
    public function __construct(private readonly array $config){}

    public function findLanguage($name): ?string
    {
        $settings = $this->config[$name] ?? [];
        return $settings['class'] ?? null;
    }

    public function getLanguages(): array
    {
        return array_keys($this->config);
    }

    public function getLanguagesWithMatches(): array
    {
        $result = [];
        foreach($this->getInputLanguages() as $name)
        {
            $result[] = [
                'key' => $name,
                'label' => trans("languages.$name"),
                'allowed_output' => $this->getLanguageMatches($name)
            ];
        }
        return $result;
    }

    public function getLanguageMatches($name): array
    {
        $matches = [];
        foreach($this->config[$name]['matches'] as $match)
        {
            $matches[$match] = trans("languages.$match");
        }
        return $matches;
    }

    public function getInputLanguages(): array
    {
        return $this->filterLanguages('input', 1);
    }

    public function getOutputLanguages(): array
    {
        return $this->filterLanguages('output', 1);
    }

    private function filterLanguages($key, $value): array
    {
        $result = [];
        foreach($this->config as $name => $settings)
        {
            if(isset($settings[$key]) && $settings[$key] == $value) $result[] = $name;
        }
        return $result;
    }
}
